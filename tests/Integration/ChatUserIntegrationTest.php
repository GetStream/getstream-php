<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\GeneratedModels;

/**
 * Integration tests for Chat User operations.
 * Follows the pattern from getstream-go's chat_user_integration_test.go.
 */
class ChatUserIntegrationTest extends ChatTestCase
{
    /**
     * @test
     */
    public function testUpsertUsers(): void
    {
        // Create 2 users
        $userIDs = $this->createTestUsers(2);
        self::assertCount(2, $userIDs);

        // Verify both users were created by querying
        $response = $this->client->queryUsers(new GeneratedModels\QueryUsersPayload(
            filterConditions: (object) ['id' => (object) ['$in' => $userIDs]],
        ));
        $this->assertResponseSuccess($response, 'query users');

        $data = $response->getData();
        self::assertNotNull($data->users, 'Users should not be null');
        self::assertCount(2, $data->users, 'Should find exactly 2 users');
    }
}
