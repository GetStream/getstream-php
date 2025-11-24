<?php

declare(strict_types=1);

namespace GetStream\Tests;

use GetStream\StreamResponse;
use PHPUnit\Framework\TestCase;

class StreamResponseTest extends TestCase
{
    /**
     * @test
     */
    public function streamResponseConstruction(): void
    {
        // Arrange
        $statusCode = 200;
        $headers = ['content-type' => 'application/json', 'x-custom' => 'test'];
        $data = ['id' => 123, 'message' => 'success'];
        $rawBody = '{"id":123,"message":"success"}';

        // Act
        $response = new StreamResponse($statusCode, $headers, $data, $rawBody);

        // Assert
        self::assertSame($statusCode, $response->getStatusCode());
        self::assertSame($headers, $response->getHeaders());
        self::assertSame($data, $response->getData());
        self::assertSame($rawBody, $response->getRawBody());
    }

    /**
     * @test
     */
    public function getHeader(): void
    {
        // Arrange
        $headers = ['content-type' => 'application/json', 'x-custom' => 'test'];
        $response = new StreamResponse(200, $headers, []);

        // Act & Assert
        self::assertSame('application/json', $response->getHeader('content-type'));
        self::assertSame('test', $response->getHeader('x-custom'));
        self::assertNull($response->getHeader('non-existent'));
    }

    /**
     * @test
     */
    public function isSuccessful(): void
    {
        // Test successful responses
        self::assertTrue((new StreamResponse(200, [], []))->isSuccessful());
        self::assertTrue((new StreamResponse(201, [], []))->isSuccessful());
        self::assertTrue((new StreamResponse(299, [], []))->isSuccessful());

        // Test non-successful responses
        self::assertFalse((new StreamResponse(199, [], []))->isSuccessful());
        self::assertFalse((new StreamResponse(300, [], []))->isSuccessful());
        self::assertFalse((new StreamResponse(400, [], []))->isSuccessful());
        self::assertFalse((new StreamResponse(404, [], []))->isSuccessful());
        self::assertFalse((new StreamResponse(500, [], []))->isSuccessful());
    }

    /**
     * @test
     */
    public function toArray(): void
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
        self::assertSame($expected, $array);
    }

    /**
     * @test
     */
    public function withNullRawBody(): void
    {
        // Arrange & Act
        $response = new StreamResponse(204, [], null);

        // Assert
        self::assertNull($response->getRawBody());
        self::assertNull($response->getData());
    }
}
