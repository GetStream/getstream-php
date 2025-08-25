<?php

declare(strict_types=1);

namespace GetStream\Tests;

use GetStream\Client;
use GetStream\ClientBuilder;
use GetStream\Http\HttpClientInterface;
use GetStream\Exceptions\StreamException;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class ClientBuilderTest extends TestCase
{
    private HttpClientInterface|MockObject $mockHttpClient;

    protected function setUp(): void
    {
        $this->mockHttpClient = $this->createMock(HttpClientInterface::class);
        
        // Clear environment variables
        unset($_ENV['STREAM_API_KEY']);
        unset($_ENV['STREAM_API_SECRET']);
        unset($_ENV['STREAM_BASE_URL']);
    }

    public function testBuildWithExplicitCredentials(): void
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
        $this->assertInstanceOf(Client::class, $client);
        $this->assertEquals('test-key', $client->getApiKey());
        $this->assertEquals('test-secret', $client->getApiSecret());
        $this->assertEquals('https://custom.api.com', $client->getBaseUrl());
        $this->assertSame($this->mockHttpClient, $client->getHttpClient());
    }

    public function testBuildWithEnvironmentVariables(): void
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
        $this->assertInstanceOf(Client::class, $client);
        $this->assertEquals('env-key', $client->getApiKey());
        $this->assertEquals('env-secret', $client->getApiSecret());
        $this->assertEquals('https://env.api.com', $client->getBaseUrl());
    }

    public function testFromEnvStaticMethod(): void
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
        $this->assertInstanceOf(Client::class, $client);
        $this->assertEquals('static-key', $client->getApiKey());
        $this->assertEquals('static-secret', $client->getApiSecret());
    }

    public function testExplicitCredentialsOverrideEnvironment(): void
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
        $this->assertEquals('explicit-key', $client->getApiKey());
        $this->assertEquals('explicit-secret', $client->getApiSecret());
    }

    public function testBuildThrowsExceptionWhenApiKeyMissing(): void
    {
        // Clear all environment variables for this test
        $originalApiKey = $_ENV['STREAM_API_KEY'] ?? null;
        $originalApiSecret = $_ENV['STREAM_API_SECRET'] ?? null;
        unset($_ENV['STREAM_API_KEY'], $_SERVER['STREAM_API_KEY']);
        unset($_ENV['STREAM_API_SECRET'], $_SERVER['STREAM_API_SECRET']);
        
        $this->expectException(StreamException::class);
        $this->expectExceptionMessage('API key not provided. Set STREAM_API_KEY environment variable or call apiKey() method.');

        try {
            (new ClientBuilder())
                ->apiSecret('test-secret')
                ->skipEnvLoad()
                ->build();
        } finally {
            // Restore environment variables
            if ($originalApiKey !== null) $_ENV['STREAM_API_KEY'] = $originalApiKey;
            if ($originalApiSecret !== null) $_ENV['STREAM_API_SECRET'] = $originalApiSecret;
        }
    }

    public function testBuildThrowsExceptionWhenApiSecretMissing(): void
    {
        // Clear all environment variables for this test
        $originalApiKey = $_ENV['STREAM_API_KEY'] ?? null;
        $originalApiSecret = $_ENV['STREAM_API_SECRET'] ?? null;
        unset($_ENV['STREAM_API_KEY'], $_SERVER['STREAM_API_KEY']);
        unset($_ENV['STREAM_API_SECRET'], $_SERVER['STREAM_API_SECRET']);
        
        $this->expectException(StreamException::class);
        $this->expectExceptionMessage('API secret not provided. Set STREAM_API_SECRET environment variable or call apiSecret() method.');

        try {
            (new ClientBuilder())
                ->apiKey('test-key')
                ->skipEnvLoad()
                ->build();
        } finally {
            // Restore environment variables
            if ($originalApiKey !== null) $_ENV['STREAM_API_KEY'] = $originalApiKey;
            if ($originalApiSecret !== null) $_ENV['STREAM_API_SECRET'] = $originalApiSecret;
        }
    }

    public function testDefaultBaseUrl(): void
    {
        // Arrange & Act
        $client = (new ClientBuilder())
            ->apiKey('test-key')
            ->apiSecret('test-secret')
            ->skipEnvLoad()
            ->build();

        // Assert
        $this->assertEquals('https://chat.stream-io-api.com', $client->getBaseUrl());
    }

    public function testEnvironmentBaseUrlOverridesDefault(): void
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
        $this->assertEquals('https://custom-env.api.com', $client->getBaseUrl());
    }

    public function testFluentInterface(): void
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

        $this->assertSame($builder, $result);
    }
}
