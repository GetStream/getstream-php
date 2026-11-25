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

    /**
     * @test
     */
    public function uploadFileRejectsLocalFilesystemPathInBase64Field(): void
    {
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        $this->mockHttpClient->expects(self::never())->method('request');
        $this->expectException(StreamException::class);
        $this->expectExceptionMessage('Failed to decode base64 file data');

        $client->uploadFile(new \GetStream\GeneratedModels\FileUploadRequest(file: __FILE__));
    }

    /**
     * @test
     */
    public function uploadImageRejectsLocalFilesystemPathInBase64Field(): void
    {
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        $this->mockHttpClient->expects(self::never())->method('request');
        $this->expectException(StreamException::class);
        $this->expectExceptionMessage('Failed to decode base64 file data');

        $client->uploadImage(new \GetStream\GeneratedModels\ImageUploadRequest(file: __FILE__));
    }

    /**
     * @test
     */
    public function uploadFileDecodesValidBase64Payload(): void
    {
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        $this->mockHttpClient->expects(self::once())
            ->method('request')
            ->with(
                'POST',
                self::stringContains('/api/v2/uploads/file?api_key=env-key'),
                self::isType('array'),
                self::callback(static function (mixed $multipart): bool {
                    return is_array($multipart)
                        && isset($multipart[0]['contents'])
                        && $multipart[0]['contents'] === 'hello world';
                })
            )
            ->willReturn(new StreamResponse(200, [], ['file' => 'https://cdn.example/file.pdf']));

        $client->uploadFile(new \GetStream\GeneratedModels\FileUploadRequest(file: base64_encode('hello world')));
    }

    /**
     * @test
     */
    public function uploadFileFromPathExplicitlyReadsLocalFile(): void
    {
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        $tmpFile = tempnam(sys_get_temp_dir(), 'stream-upload-test-');
        self::assertIsString($tmpFile);
        file_put_contents($tmpFile, 'local-file-bytes');

        try {
            $this->mockHttpClient->expects(self::once())
                ->method('request')
                ->with(
                    'POST',
                    self::stringContains('/api/v2/uploads/file?api_key=env-key'),
                    self::isType('array'),
                    self::callback(static function (mixed $multipart) use ($tmpFile): bool {
                        return is_array($multipart)
                            && ($multipart[0]['contents'] ?? null) === 'local-file-bytes'
                            && ($multipart[0]['filename'] ?? null) === basename($tmpFile);
                    })
                )
                ->willReturn(new StreamResponse(200, [], ['file' => 'https://cdn.example/test']));

            $client->uploadFileFromPath($tmpFile);
        } finally {
            @unlink($tmpFile);
        }
    }
}
