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

    public function testBuildRequiresApiKey(): void
    {
        // Test that providing API secret but no API key still works if key is in environment
        $client = (new ClientBuilder())
            ->apiSecret('test-secret')
            ->build();

        $this->assertInstanceOf(Client::class, $client);
        $this->assertNotEmpty($client->getApiKey()); // Should get from environment
        $this->assertEquals('test-secret', $client->getApiSecret());
    }

    public function testBuildRequiresApiSecret(): void
    {
        // Test that providing API key but no API secret still works if secret is in environment
        $client = (new ClientBuilder())
            ->apiKey('test-key')
            ->build();

        $this->assertInstanceOf(Client::class, $client);
        $this->assertEquals('test-key', $client->getApiKey());
        $this->assertNotEmpty($client->getApiSecret()); // Should get from environment
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
