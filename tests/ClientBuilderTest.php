<?php

declare(strict_types=1);

namespace GetStream\Tests;

use GetStream\Client;
use GetStream\ClientBuilder;
use GetStream\Http\HttpClientInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ClientBuilderTest extends TestCase
{
    private HttpClientInterface|MockObject $mockHttpClient;

    protected function setUp(): void
    {
        $this->mockHttpClient = $this->createMock(HttpClientInterface::class);

        // Clear environment variables
        unset($_ENV['STREAM_API_KEY'], $_ENV['STREAM_API_SECRET'], $_ENV['STREAM_BASE_URL']);
    }

    /**
     * @test
     */
    public function buildWithExplicitCredentials(): void
    {
        // Arrange & Act
        $client = (new ClientBuilder())
            ->apiKey('test-key')
            ->apiSecret('test-secret')
            ->baseUrl('https://custom.api.com')
            ->httpClient($this->mockHttpClient)
            ->skipEnvLoad()
            ->build();

        // Assert
        self::assertInstanceOf(Client::class, $client);
        self::assertSame('test-key', $client->getApiKey());
        self::assertSame('test-secret', $client->getApiSecret());
        self::assertSame('https://custom.api.com', $client->getBaseUrl());
        self::assertSame($this->mockHttpClient, $client->getHttpClient());
    }

    /**
     * @test
     */
    public function buildWithEnvironmentVariables(): void
    {
        // Arrange
        $_ENV['STREAM_API_KEY'] = 'env-key';
        $_ENV['STREAM_API_SECRET'] = 'env-secret';
        $_ENV['STREAM_BASE_URL'] = 'https://env.api.com';

        // Act
        $client = (new ClientBuilder())
            ->httpClient($this->mockHttpClient)
            ->skipEnvLoad() // Skip .env file loading, use $_ENV directly
            ->build();

        // Assert
        self::assertInstanceOf(Client::class, $client);
        self::assertSame('env-key', $client->getApiKey());
        self::assertSame('env-secret', $client->getApiSecret());
        self::assertSame('https://env.api.com', $client->getBaseUrl());
    }

    /**
     * @test
     */
    public function fromEnvStaticMethod(): void
    {
        // Arrange
        $_ENV['STREAM_API_KEY'] = 'static-key';
        $_ENV['STREAM_API_SECRET'] = 'static-secret';

        // Act
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->skipEnvLoad()
            ->build();

        // Assert
        self::assertInstanceOf(Client::class, $client);
        self::assertSame('static-key', $client->getApiKey());
        self::assertSame('static-secret', $client->getApiSecret());
    }

    /**
     * @test
     */
    public function explicitCredentialsOverrideEnvironment(): void
    {
        // Arrange
        $_ENV['STREAM_API_KEY'] = 'env-key';
        $_ENV['STREAM_API_SECRET'] = 'env-secret';

        // Act
        $client = (new ClientBuilder())
            ->apiKey('explicit-key')
            ->apiSecret('explicit-secret')
            ->httpClient($this->mockHttpClient)
            ->skipEnvLoad()
            ->build();

        // Assert
        self::assertSame('explicit-key', $client->getApiKey());
        self::assertSame('explicit-secret', $client->getApiSecret());
    }

    /**
     * @test
     */
    public function buildRequiresApiKey(): void
    {
        // Test that providing API secret but no API key still works if key is in environment
        $client = (new ClientBuilder())
            ->apiSecret('test-secret')
            ->build();

        self::assertInstanceOf(Client::class, $client);
        self::assertNotEmpty($client->getApiKey()); // Should get from environment
        self::assertSame('test-secret', $client->getApiSecret());
    }

    /**
     * @test
     */
    public function buildRequiresApiSecret(): void
    {
        // Test that providing API key but no API secret still works if secret is in environment
        $client = (new ClientBuilder())
            ->apiKey('test-key')
            ->build();

        self::assertInstanceOf(Client::class, $client);
        self::assertSame('test-key', $client->getApiKey());
        self::assertNotEmpty($client->getApiSecret()); // Should get from environment
    }

    /**
     * @test
     */
    public function defaultBaseUrl(): void
    {
        // Arrange & Act
        $client = (new ClientBuilder())
            ->apiKey('test-key')
            ->apiSecret('test-secret')
            ->skipEnvLoad()
            ->build();

        // Assert
        self::assertSame('https://chat.stream-io-api.com', $client->getBaseUrl());
    }

    /**
     * @test
     */
    public function environmentBaseUrlOverridesDefault(): void
    {
        // Arrange
        $_ENV['STREAM_API_KEY'] = 'env-key';
        $_ENV['STREAM_API_SECRET'] = 'env-secret';
        $_ENV['STREAM_BASE_URL'] = 'https://custom-env.api.com';

        // Act
        $client = (new ClientBuilder())
            ->skipEnvLoad()
            ->build();

        // Assert
        self::assertSame('https://custom-env.api.com', $client->getBaseUrl());
    }

    /**
     * @test
     */
    public function fluentInterface(): void
    {
        // Test that all methods return the builder instance for chaining
        $builder = new ClientBuilder();

        $result = $builder
            ->apiKey('test')
            ->apiSecret('test')
            ->baseUrl('test')
            ->httpClient($this->mockHttpClient)
            ->skipEnvLoad()
            ->envPath('/test/path');

        self::assertSame($builder, $result);
    }
}
