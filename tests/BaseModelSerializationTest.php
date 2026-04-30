<?php

declare(strict_types=1);

namespace GetStream\Tests;

use GetStream\GeneratedModels\DeactivateUserRequest;
use PHPUnit\Framework\TestCase;

/**
 * Test BaseModel serialization behavior.
 */
class BaseModelSerializationTest extends TestCase
{
    /**
     * Test that empty request objects serialize to {} (object) not [] (array)
     * This was a bug where empty requests would serialize to [] causing API errors:
     * "expected object but got array".
     *
     * @test
     */
    public function emptyRequestSerializesToObject(): void
    {
        $emptyRequest = new DeactivateUserRequest();

        // Serialize to JSON
        $json = json_encode($emptyRequest);

        // Should be {} not []
        self::assertSame('{}', $json, 'Empty request should serialize to {} (object) not [] (array)');

        // Verify it decodes as an object (stdClass for empty {})
        $decoded = json_decode($json);
        self::assertInstanceOf(\stdClass::class, $decoded, 'Decoded empty request should be a stdClass object');
    }

    /**
     * Test that requests with properties serialize to proper object.
     *
     * @test
     */
    public function requestWithPropertiesSerializesCorrectly(): void
    {
        $request = new DeactivateUserRequest(
            markMessagesDeleted: true,
            createdByID: 'admin-123'
        );

        $json = json_encode($request);
        $decoded = json_decode($json, true);

        self::assertIsArray($decoded);
        self::assertArrayHasKey('mark_messages_deleted', $decoded);
        self::assertTrue($decoded['mark_messages_deleted']);
        self::assertArrayHasKey('created_by_id', $decoded);
        self::assertSame('admin-123', $decoded['created_by_id']);
    }

    /**
     * Test that requests with only some null properties still serialize correctly.
     *
     * @test
     */
    public function requestWithSomeNullPropertiesSerializesCorrectly(): void
    {
        $request = new DeactivateUserRequest(
            markMessagesDeleted: true
            // createdByID is null
        );

        $json = json_encode($request);
        $decoded = json_decode($json, true);

        self::assertIsArray($decoded);
        self::assertArrayHasKey('mark_messages_deleted', $decoded);
        self::assertArrayNotHasKey('created_by_id', $decoded, 'Null properties should be omitted');
    }

    /**
     * Demonstration of the bug that was fixed.
     *
     * @test
     */
    public function bugFixDemo(): void
    {
        echo "\n📝 Demonstrating the bug fix:\n";

        // Before fix: empty request would serialize to []
        // After fix: empty request serializes to {}
        $emptyRequest = new DeactivateUserRequest();
        $json = json_encode($emptyRequest);

        echo "Empty DeactivateUserRequest serializes to: {$json}\n";
        echo "Expected: {}\n";

        self::assertSame('{}', $json);

        // With properties
        $requestWithProps = new DeactivateUserRequest(markMessagesDeleted: true);
        $jsonWithProps = json_encode($requestWithProps);

        echo "\nDeactivateUserRequest with markMessagesDeleted=true serializes to: {$jsonWithProps}\n";
        echo "Expected: {\"mark_messages_deleted\":true}\n";

        self::assertStringContainsString('mark_messages_deleted', $jsonWithProps);
        self::assertStringContainsString('true', $jsonWithProps);
    }
}
