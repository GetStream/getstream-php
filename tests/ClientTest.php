<?php

declare(strict_types=1);

namespace GetStream\Tests;

use GetStream\Client;
use GetStream\ClientBuilder;
use GetStream\Feed;
use GetStream\Http\HttpClientInterface;
use GetStream\Auth\JWTGenerator;
use GetStream\Exceptions\StreamException;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class ClientTest extends TestCase
{
    private HttpClientInterface|MockObject $mockHttpClient;

    protected function setUp(): void
    {
        $this->mockHttpClient = $this->createMock(HttpClientInterface::class);
    }

    public function testClientConstruction(): void
    {
        // Load credentials from environment
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        // Assert - verify environment credentials are loaded
        $this->assertNotEmpty($client->getApiKey());
        $this->assertNotEmpty($client->getApiSecret());
        $this->assertEquals('https://chat.stream-io-api.com', $client->getBaseUrl());
        $this->assertSame($this->mockHttpClient, $client->getHttpClient());
        $this->assertInstanceOf(JWTGenerator::class, $client->getJWTGenerator());
    }

    public function testClientConstructionWithDefaults(): void
    {
        // Load from environment with defaults
        $client = ClientBuilder::fromEnv()->build();

        // Assert
        $this->assertNotEmpty($client->getApiKey());
        $this->assertNotEmpty($client->getApiSecret());
        $this->assertEquals('https://chat.stream-io-api.com', $client->getBaseUrl());
    }

    public function testClientConstructionWithEmptyApiKey(): void
    {
        $this->expectException(StreamException::class);
        $this->expectExceptionMessage('API key cannot be empty');
        
        new Client('', 'test-api-secret');
    }

    public function testClientConstructionWithEmptyApiSecret(): void
    {
        $this->expectException(StreamException::class);
        $this->expectExceptionMessage('API secret cannot be empty');
        
        new Client('test-api-key', '');
    }

    public function testFeedCreation(): void
    {
        // Arrange
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        // Act
        $feed = $client->feed('user', '123');

        // Assert
        $this->assertInstanceOf(Feed::class, $feed);
        $this->assertEquals('user', $feed->getFeedGroup());
        $this->assertEquals('123', $feed->getFeedId());
    }

    public function testCreateUserToken(): void
    {
        // Arrange
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();

        // Act
        $token = $client->createUserToken('user-123');

        // Assert
        $this->assertIsString($token);
        $this->assertNotEmpty($token);
        
        // Verify it's a valid JWT format (3 parts separated by dots)
        $parts = explode('.', $token);
        $this->assertCount(3, $parts);
        
        // Verify the payload contains the user_id
        $payload = json_decode(base64_decode($parts[1]), true);
        $this->assertEquals('user-123', $payload['user_id']);
    }

    public function testCreateUserTokenWithClaims(): void
    {
        // Arrange
        $client = ClientBuilder::fromEnv()
            ->httpClient($this->mockHttpClient)
            ->build();
        $claims = ['role' => 'admin', 'permissions' => ['read', 'write']];

        // Act
        $token = $client->createUserToken('user-123', $claims, 3600);

        // Assert
        $this->assertIsString($token);
        $this->assertNotEmpty($token);
        
        // Verify the payload contains the custom claims
        $parts = explode('.', $token);
        $payload = json_decode(base64_decode($parts[1]), true);
        $this->assertEquals('user-123', $payload['user_id']);
        $this->assertEquals('admin', $payload['role']);
        $this->assertEquals(['read', 'write'], $payload['permissions']);
        $this->assertArrayHasKey('exp', $payload); // Should have expiration
    }
}
