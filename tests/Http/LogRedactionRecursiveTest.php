<?php

declare(strict_types=1);

namespace GetStream\Tests\Http;

use GetStream\Http\LogRedaction;
use PHPUnit\Framework\TestCase;

final class LogRedactionRecursiveTest extends TestCase
{
    public function testRedactsNestedAndPatternMatchedSecretKeys(): void
    {
        $payload = json_encode([
            'access_token' => 'tok-123',
            'keep' => 'visible',
            'storage' => [
                's3_secret' => 'aws-secret-value',
                'firebase_credentials' => '{"private_key":"pem"}',
                'bucket' => 'my-bucket',
            ],
            'items' => [
                ['apn_auth_key' => 'p8-key', 'name' => 'ios'],
            ],
        ], JSON_THROW_ON_ERROR);

        $redacted = LogRedaction::redactJsonBody($payload);
        self::assertNotNull($redacted);
        self::assertStringNotContainsString('tok-123', $redacted);
        self::assertStringNotContainsString('aws-secret-value', $redacted);
        self::assertStringNotContainsString('p8-key', $redacted);

        $decoded = json_decode($redacted, true, 512, JSON_THROW_ON_ERROR);
        self::assertSame('<redacted>', $decoded['access_token']);
        self::assertSame('visible', $decoded['keep']);
        self::assertSame('<redacted>', $decoded['storage']['s3_secret']);
        self::assertSame('<redacted>', $decoded['storage']['firebase_credentials']);
        self::assertSame('my-bucket', $decoded['storage']['bucket']);
        self::assertSame('<redacted>', $decoded['items'][0]['apn_auth_key']);
        self::assertSame('ios', $decoded['items'][0]['name']);
    }
}
