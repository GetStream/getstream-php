<?php

declare(strict_types=1);

namespace GetStream\Tests;

use GetStream\StreamResponse;
use PHPUnit\Framework\TestCase;

class StreamResponseTest extends TestCase
{
    public function testStreamResponseConstruction(): void
    {
        // Arrange
        $statusCode = 200;
        $headers = ['content-type' => 'application/json', 'x-custom' => 'test'];
        $data = ['id' => 123, 'message' => 'success'];
        $rawBody = '{"id":123,"message":"success"}';

        // Act
        $response = new StreamResponse($statusCode, $headers, $data, $rawBody);

        // Assert
        $this->assertEquals($statusCode, $response->getStatusCode());
        $this->assertEquals($headers, $response->getHeaders());
        $this->assertEquals($data, $response->getData());
        $this->assertEquals($rawBody, $response->getRawBody());
    }

    public function testGetHeader(): void
    {
        // Arrange
        $headers = ['content-type' => 'application/json', 'x-custom' => 'test'];
        $response = new StreamResponse(200, $headers, []);

        // Act & Assert
        $this->assertEquals('application/json', $response->getHeader('content-type'));
        $this->assertEquals('test', $response->getHeader('x-custom'));
        $this->assertNull($response->getHeader('non-existent'));
    }

    public function testIsSuccessful(): void
    {
        // Test successful responses
        $this->assertTrue((new StreamResponse(200, [], []))->isSuccessful());
        $this->assertTrue((new StreamResponse(201, [], []))->isSuccessful());
        $this->assertTrue((new StreamResponse(299, [], []))->isSuccessful());

        // Test non-successful responses
        $this->assertFalse((new StreamResponse(199, [], []))->isSuccessful());
        $this->assertFalse((new StreamResponse(300, [], []))->isSuccessful());
        $this->assertFalse((new StreamResponse(400, [], []))->isSuccessful());
        $this->assertFalse((new StreamResponse(404, [], []))->isSuccessful());
        $this->assertFalse((new StreamResponse(500, [], []))->isSuccessful());
    }

    public function testToArray(): void
    {
        // Arrange
        $statusCode = 201;
        $headers = ['content-type' => 'application/json'];
        $data = ['created' => true];
        $response = new StreamResponse($statusCode, $headers, $data);

        // Act
        $array = $response->toArray();

        // Assert
        $expected = [
            'status_code' => 201,
            'headers' => ['content-type' => 'application/json'],
            'data' => ['created' => true],
        ];
        $this->assertEquals($expected, $array);
    }

    public function testWithNullRawBody(): void
    {
        // Arrange & Act
        $response = new StreamResponse(204, [], null);

        // Assert
        $this->assertNull($response->getRawBody());
        $this->assertNull($response->getData());
    }
}

