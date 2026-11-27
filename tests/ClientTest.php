<?php

declare(strict_types=1);

namespace GetStream\Tests;

use GetStream\Auth\JWTGenerator;
use GetStream\Client;
use GetStream\ClientBuilder;
use GetStream\Exceptions\StreamException;
use GetStream\Feed;
use GetStream\Http\HttpClientInterface;
use GetStream\StreamResponse;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    private HttpClientInterface|MockObject $mockHttpClient;

    protected function setUp(): void
    {
        $this->mockHttpClient = $this->createMock(HttpClientInterface::class);

        // Set rather than read the ambient environment: CI runs this lane with no credentials.
        $_ENV['STREAM_API_KEY'] = 'env-key';
        $_ENV['STREAM_API_SECRET'] = '0123456789abcdef0123456789abcdef';
    }

    protected function tearDown(): void
    {
        unset($_ENV['STREAM_API_KEY'], $_ENV['STREAM_API_SECRET']);
    }

    /**
     * @test
     */
    public function clientConstruction(): void
    {
        // Load credentials from environment
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        // Assert - verify environment credentials are loaded
        self::assertNotEmpty($client->getApiKey());
        self::assertNotEmpty($client->getApiSecret());
        self::assertSame('https://chat.stream-io-api.com', $client->getBaseUrl());
        self::assertSame($this->mockHttpClient, $client->getHttpClient());
        self::assertInstanceOf(JWTGenerator::class, $client->getJWTGenerator());
    }

    /**
     * @test
     */
    public function clientConstructionWithDefaults(): void
    {
        // Load from environment with defaults
        $client = ClientBuilder::fromEnv()->build();

        // Assert
        self::assertNotEmpty($client->getApiKey());
        self::assertNotEmpty($client->getApiSecret());
        self::assertSame('https://chat.stream-io-api.com', $client->getBaseUrl());
    }

    /**
     * @test
     */
    public function clientConstructionWithEmptyApiKey(): void
    {
        $this->expectException(StreamException::class);
        $this->expectExceptionMessage('API key cannot be empty');

        new Client('', 'test-api-secret');
    }

    /**
     * @test
     */
    public function clientConstructionWithEmptyApiSecret(): void
    {
        $this->expectException(StreamException::class);
        $this->expectExceptionMessage('API secret cannot be empty');

        new Client('test-api-key', '');
    }

    /**
     * @test
     */
    public function feedCreation(): void
    {
        // Arrange
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        // Act
        $feed = $client->feed('user', '123');

        // Assert
        self::assertInstanceOf(Feed::class, $feed);
        self::assertSame('user', $feed->getFeedGroup());
        self::assertSame('123', $feed->getFeedId());
    }

    /**
     * @test
     */
    public function createUserToken(): void
    {
        // Arrange
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        // Act
        $token = $client->createUserToken('user-123');

        // Assert
        self::assertIsString($token);
        self::assertNotEmpty($token);

        // Verify it's a valid JWT format (3 parts separated by dots)
        $parts = explode('.', $token);
        self::assertCount(3, $parts);

        // Verify the payload contains the user_id
        $payload = json_decode(base64_decode($parts[1], true), true);
        self::assertSame('user-123', $payload['user_id']);
    }

    /**
     * @test
     */
    public function createUserTokenWithClaims(): void
    {
        // Arrange
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();
        $claims = ['role' => 'admin', 'permissions' => ['read', 'write']];

        // Act
        $token = $client->createUserToken('user-123', $claims, 3600);

        // Assert
        self::assertIsString($token);
        self::assertNotEmpty($token);

        // Verify the payload contains the custom claims
        $parts = explode('.', $token);
        $payload = json_decode(base64_decode($parts[1], true), true);
        self::assertSame('user-123', $payload['user_id']);
        self::assertSame('admin', $payload['role']);
        self::assertSame(['read', 'write'], $payload['permissions']);
        self::assertArrayHasKey('exp', $payload); // Should have expiration
    }

    /**
     * @return array<string, array{string, mixed}>
     */
    public static function reservedUserTokenClaims(): array
    {
        return [
            'empty user_id' => ['user_id', ''],
            'other user_id' => ['user_id', 'other-user'],
            'server true' => ['server', true],
            'server false' => ['server', false],
            'egress' => ['egress', true],
        ];
    }

    /**
     * Other spellings the backend's JSON decoder reads as a claim it uses: case variants,
     * the long s (U+017F, folds to s) and the Kelvin sign (U+212A, folds to k).
     *
     * @return array<string, array{string}>
     */
    public static function foldedClaimNames(): array
    {
        $names = [
            'USER_ID', 'User_Id', "u\u{017F}er_id", "\u{017F}erver", 'SERVER', 'Egress',
            "egre\u{017F}\u{017F}", 'IAT', 'Exp', 'Role', 'Call_CIDs', "stream_chec\u{212A}_writes",
        ];

        return array_combine($names, array_map(fn ($name) => [$name], $names));
    }

    /**
     * @test
     *
     * @dataProvider foldedClaimNames
     */
    public function createUserTokenRejectsFoldedClaimNames(string $claim): void
    {
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        $this->expectException(StreamException::class);
        $this->expectExceptionMessage(sprintf('Claim "%s" is read by the backend as', $claim));

        $client->createUserToken('user-123', [$claim => '']);
    }

    /**
     * @return array<string, array{mixed}>
     */
    public static function invalidIatClaims(): array
    {
        return [
            'zero' => [0],
            'negative' => [-1],
            'fraction' => [1.5],
            'future' => [time() + 3600],
            'string' => ['1700000000'],
            'null' => [null],
        ];
    }

    /**
     * @test
     *
     * @dataProvider invalidIatClaims
     */
    public function createUserTokenRejectsInvalidIat(mixed $iat): void
    {
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        $this->expectException(StreamException::class);
        $this->expectExceptionMessage('"iat"');

        $client->createUserToken('user-123', ['iat' => $iat]);
    }

    /**
     * @test
     */
    public function createUserTokenKeepsPastCustomIat(): void
    {
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();
        $iat = time() - 60;

        $token = $client->createUserToken('user-123', ['iat' => $iat]);

        $payload = $client->getJWTGenerator()->verifyToken($token);
        self::assertSame($iat, $payload['iat']);
    }

    /**
     * @test
     */
    public function createUserTokenPutsUserIdLast(): void
    {
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        $token = $client->createUserToken('user-123', ['role' => 'admin', 'zzz' => 'custom'], 3600);

        // The backend's decoder lets the last matching key win, so nothing may follow user_id.
        $parts = explode('.', $token);
        $payload = json_decode(base64_decode(strtr($parts[1], '-_', '+/'), true), true);
        self::assertSame('user-123', $payload['user_id']);
        self::assertSame('user_id', array_key_last($payload));
    }

    /**
     * @test
     *
     * @dataProvider reservedUserTokenClaims
     */
    public function createUserTokenRejectsReservedClaims(string $claim, mixed $value): void
    {
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        $this->expectException(StreamException::class);
        $this->expectExceptionMessage(sprintf('"%s" is reserved', $claim));

        $client->createUserToken('user-123', [$claim => $value]);
    }

    /**
     * @test
     */
    public function createUserTokenExpirationWinsOverCustomExp(): void
    {
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();
        $before = time();

        $token = $client->createUserToken('user-123', ['exp' => $before + 100 * 365 * 24 * 3600], 3600);

        $payload = $client->getJWTGenerator()->verifyToken($token);
        self::assertSame('user-123', $payload['user_id']);
        self::assertGreaterThanOrEqual($before + 3600, $payload['exp']);
        self::assertLessThanOrEqual(time() + 3600, $payload['exp']);
    }

    /**
     * @test
     */
    public function createUserTokenKeepsCustomExpWithoutExpiration(): void
    {
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();
        $exp = time() + 7200;

        $token = $client->createUserToken('user-123', ['exp' => $exp, 'call_cids' => ['default:call']]);

        $payload = $client->getJWTGenerator()->verifyToken($token);
        self::assertSame($exp, $payload['exp']);
        self::assertSame(['default:call'], $payload['call_cids']);
        self::assertArrayNotHasKey('server', $payload);
    }

    /**
     * @test
     */
    public function listQueryParamsAreSentCommaSeparated(): void
    {
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        $this->mockHttpClient->expects(self::once())
            ->method('request')
            ->with('GET', self::stringContains('?product=chat%2Cvideo&limit=10&api_key=env-key'))
            ->willReturn(new StreamResponse(200, [], []));

        $client->makeRequest('GET', '/api/v2/hooks/events', ['product' => ['chat', 'video'], 'limit' => 10]);
    }

    /**
     * @test
     */
    public function listQueryParamWithCommaIsRejected(): void
    {
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        $this->mockHttpClient->expects(self::never())->method('request');
        $this->expectException(StreamException::class);

        $client->makeRequest('DELETE', '/api/v2/feeds/users/u1/interests', ['tags' => ['rock', 'rock, pop']]);
    }
}
