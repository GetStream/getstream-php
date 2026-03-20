<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\GeneratedModels;
use PHPUnit\Framework\Attributes\Group;

/**
 * Integration tests for Chat User operations.
 * Follows the pattern from getstream-go's chat_user_integration_test.go.
 */
#[Group('integration')]
class ChatUserIntegrationTest extends ChatTestCase
{
    /**
     * @test
     */
    public function testUpsertUsers(): void
    {
        $userIDs = $this->createTestUsers(2);
        self::assertCount(2, $userIDs);

        $response = $this->client->queryUsers(new GeneratedModels\QueryUsersPayload(
            filterConditions: (object) ['id' => (object) ['$in' => $userIDs]],
        ));
        $this->assertResponseSuccess($response, 'query users');

        $data = $response->getData();
        self::assertNotNull($data->users, 'Users should not be null');
        self::assertCount(2, $data->users, 'Should find exactly 2 users');
    }

    /**
     * @test
     */
    public function testQueryUsers(): void
    {
        $userIDs = $this->createTestUsers(2);

        $response = $this->client->queryUsers(new GeneratedModels\QueryUsersPayload(
            filterConditions: (object) ['id' => (object) ['$in' => $userIDs]],
        ));
        $this->assertResponseSuccess($response, 'query users');

        $data = $response->getData();
        self::assertNotNull($data->users);
        self::assertGreaterThanOrEqual(2, count($data->users));

        $foundIDs = array_map(static fn ($u) => $u->id, $data->users);
        foreach ($userIDs as $id) {
            self::assertContains($id, $foundIDs, "User {$id} should be found in query results");
        }
    }

    /**
     * @test
     */
    public function testQueryUsersWithOffsetLimit(): void
    {
        $userIDs = $this->createTestUsers(3);

        $response = $this->client->queryUsers(new GeneratedModels\QueryUsersPayload(
            filterConditions: (object) ['id' => (object) ['$in' => $userIDs]],
            offset: 1,
            limit: 2,
        ));
        $this->assertResponseSuccess($response, 'query users with offset/limit');

        $data = $response->getData();
        self::assertNotNull($data->users);
        self::assertCount(2, $data->users, 'Should return exactly 2 users with offset=1, limit=2');
    }

    /**
     * @test
     */
    public function testPartialUpdateUser(): void
    {
        $userIDs = $this->createTestUsers(1);
        $userID = $userIDs[0];

        // Set custom fields
        $response = $this->client->updateUsersPartial(new GeneratedModels\UpdateUsersPartialRequest(
            users: [
                new GeneratedModels\UpdateUserPartialRequest(
                    id: $userID,
                    set: (object) ['country' => 'NL', 'role' => 'admin'],
                ),
            ],
        ));
        $this->assertResponseSuccess($response, 'partial update user (set)');

        // Verify via query
        $queryResp = $this->client->queryUsers(new GeneratedModels\QueryUsersPayload(
            filterConditions: (object) ['id' => (object) ['$eq' => $userID]],
        ));
        $this->assertResponseSuccess($queryResp, 'query user after partial update');
        self::assertCount(1, $queryResp->getData()->users);

        // Unset country
        $response = $this->client->updateUsersPartial(new GeneratedModels\UpdateUsersPartialRequest(
            users: [
                new GeneratedModels\UpdateUserPartialRequest(
                    id: $userID,
                    unset: ['country'],
                ),
            ],
        ));
        $this->assertResponseSuccess($response, 'partial update user (unset)');
    }

    /**
     * @test
     */
    public function testBlockUnblockUser(): void
    {
        $userIDs = $this->createTestUsers(2);
        $alice = $userIDs[0];
        $bob = $userIDs[1];

        // Block bob from alice
        $response = $this->client->blockUsers(new GeneratedModels\BlockUsersRequest(
            blockedUserID: $bob,
            userID: $alice,
        ));
        $this->assertResponseSuccess($response, 'block user');

        // Verify bob is in alice's blocked list
        $blockedResp = $this->client->getBlockedUsers($alice);
        $this->assertResponseSuccess($blockedResp, 'get blocked users');
        $blocks = $blockedResp->getData()->blocks;
        self::assertNotNull($blocks);
        $blockedIDs = array_map(static fn ($b) => $b->blockedUserID, $blocks);
        self::assertContains($bob, $blockedIDs, 'Bob should be in blocked list');

        // Unblock bob
        $response = $this->client->unblockUsers(new GeneratedModels\UnblockUsersRequest(
            blockedUserID: $bob,
            userID: $alice,
        ));
        $this->assertResponseSuccess($response, 'unblock user');

        // Verify bob is no longer blocked
        $blockedResp = $this->client->getBlockedUsers($alice);
        $this->assertResponseSuccess($blockedResp, 'get blocked users after unblock');
        $blocks = $blockedResp->getData()->blocks ?? [];
        $blockedIDs = array_map(static fn ($b) => $b->blockedUserID, $blocks);
        self::assertNotContains($bob, $blockedIDs, 'Bob should not be in blocked list after unblock');
    }

    /**
     * @test
     */
    public function testDeactivateReactivateUser(): void
    {
        $userIDs = $this->createTestUsers(1);
        $userID = $userIDs[0];

        // Deactivate
        $response = $this->client->deactivateUser($userID, new GeneratedModels\DeactivateUserRequest());
        $this->assertResponseSuccess($response, 'deactivate user');

        // Reactivate
        $response = $this->client->reactivateUser($userID, new GeneratedModels\ReactivateUserRequest());
        $this->assertResponseSuccess($response, 'reactivate user');

        // Verify user is active by querying
        $queryResp = $this->client->queryUsers(new GeneratedModels\QueryUsersPayload(
            filterConditions: (object) ['id' => (object) ['$eq' => $userID]],
        ));
        $this->assertResponseSuccess($queryResp, 'query user after reactivation');
        self::assertNotEmpty($queryResp->getData()->users, 'User should be found after reactivation');
    }

    /**
     * @test
     */
    public function testDeleteUsers(): void
    {
        // Create users but don't track them for auto-cleanup (we're deleting them ourselves)
        $users = [];
        $ids = [];
        for ($i = 0; $i < 2; $i++) {
            $id = 'test-user-' . uniqid();
            $ids[] = $id;
            $users[$id] = new GeneratedModels\UserRequest(
                id: $id,
                name: 'Delete Test User ' . $id,
                role: 'user',
            );
        }
        $this->client->updateUsers(new GeneratedModels\UpdateUsersRequest(users: $users));

        // Delete users (async operation, may be rate-limited after previous tests)
        $response = $this->retryUntilSuccess(function () use ($ids) {
            $resp = $this->client->deleteUsers(new GeneratedModels\DeleteUsersRequest(
                userIds: $ids,
                user: 'hard',
                messages: 'hard',
                conversations: 'hard',
            ));
            $this->assertResponseSuccess($resp, 'delete users');

            return $resp;
        }, maxAttempts: 5, sleepMs: 3000);

        $taskID = $response->getData()->taskID;
        self::assertNotEmpty($taskID, 'Task ID should not be empty');

        // Wait for task to complete
        $taskResult = $this->waitForTask($taskID);
        self::assertSame('completed', $taskResult->status, 'Delete task should complete');
    }

    /**
     * @test
     */
    public function testExportUser(): void
    {
        $userIDs = $this->createTestUsers(1);
        $userID = $userIDs[0];

        $response = $this->client->exportUser($userID);
        $this->assertResponseSuccess($response, 'export user');
        self::assertNotNull($response->getData(), 'Export response should not be null');
    }

    /**
     * @test
     */
    public function testCreateGuest(): void
    {
        $guestID = 'test-guest-' . uniqid();

        try {
            $response = $this->client->createGuest(new GeneratedModels\CreateGuestRequest(
                user: new GeneratedModels\UserRequest(
                    id: $guestID,
                    name: 'Guest User ' . $guestID,
                ),
            ));
        } catch (\Exception $e) {
            // Guest access may be disabled for this app
            self::markTestSkipped('Guest user creation not enabled: ' . $e->getMessage());
        }

        $this->assertResponseSuccess($response, 'create guest');
        $data = $response->getData();
        self::assertNotEmpty($data->accessToken, 'Access token should not be empty');

        // Server may prefix the guest ID; track both for cleanup
        $this->createdUserIDs[] = $guestID;
        if ($data->user !== null && $data->user->id !== $guestID) {
            $this->createdUserIDs[] = $data->user->id;
        }
    }

    /**
     * @test
     */
    public function testUpsertUsersWithRoleAndTeamsRole(): void
    {
        $userID = 'test-user-' . uniqid();
        $this->createdUserIDs[] = $userID;

        $response = $this->client->updateUsers(new GeneratedModels\UpdateUsersRequest(
            users: [
                $userID => new GeneratedModels\UserRequest(
                    id: $userID,
                    name: 'Teams User ' . $userID,
                    role: 'admin',
                    teams: ['blue'],
                    teamsRole: ['blue' => 'admin'],
                ),
            ],
        ));
        $this->assertResponseSuccess($response, 'upsert user with role and teams_role');

        $data = $response->getData();
        self::assertNotNull($data->users);
        self::assertArrayHasKey($userID, $data->users);

        $user = $data->users[$userID];
        self::assertSame('admin', $user->role);
        self::assertSame(['blue'], $user->teams);
        self::assertSame(['blue' => 'admin'], $user->teamsRole);
    }

    /**
     * @test
     */
    public function testPartialUpdateUserWithTeam(): void
    {
        $userIDs = $this->createTestUsers(1);
        $userID = $userIDs[0];

        $response = $this->client->updateUsersPartial(new GeneratedModels\UpdateUsersPartialRequest(
            users: [
                new GeneratedModels\UpdateUserPartialRequest(
                    id: $userID,
                    set: (object) [
                        'teams' => ['blue'],
                        'teams_role' => (object) ['blue' => 'admin'],
                    ],
                ),
            ],
        ));
        $this->assertResponseSuccess($response, 'partial update user with team');

        $data = $response->getData();
        self::assertNotNull($data->users);
        self::assertArrayHasKey($userID, $data->users);

        $user = $data->users[$userID];
        self::assertSame(['blue'], $user->teams);
        self::assertSame(['blue' => 'admin'], $user->teamsRole);
    }

    /**
     * @test
     */
    public function testUpdatePrivacySettings(): void
    {
        $userID = 'test-user-' . uniqid();
        $this->createdUserIDs[] = $userID;

        // Create user without privacy settings
        $this->client->updateUsers(new GeneratedModels\UpdateUsersRequest(
            users: [
                $userID => new GeneratedModels\UserRequest(
                    id: $userID,
                    name: 'Privacy User ' . $userID,
                    role: 'user',
                ),
            ],
        ));

        // Update 1: Set typing_indicators disabled
        $response = $this->client->updateUsers(new GeneratedModels\UpdateUsersRequest(
            users: [
                $userID => new GeneratedModels\UserRequest(
                    id: $userID,
                    privacySettings: new GeneratedModels\PrivacySettingsResponse(
                        typingIndicators: new GeneratedModels\TypingIndicatorsResponse(enabled: false),
                    ),
                ),
            ],
        ));
        $this->assertResponseSuccess($response, 'update privacy settings (typing)');

        $user = $response->getData()->users[$userID];
        self::assertNotNull($user->privacySettings);
        self::assertNotNull($user->privacySettings->typingIndicators);
        self::assertFalse($user->privacySettings->typingIndicators->enabled);

        // Update 2: Set typing enabled + read_receipts disabled
        $response = $this->client->updateUsers(new GeneratedModels\UpdateUsersRequest(
            users: [
                $userID => new GeneratedModels\UserRequest(
                    id: $userID,
                    privacySettings: new GeneratedModels\PrivacySettingsResponse(
                        typingIndicators: new GeneratedModels\TypingIndicatorsResponse(enabled: true),
                        readReceipts: new GeneratedModels\ReadReceiptsResponse(enabled: false),
                    ),
                ),
            ],
        ));
        $this->assertResponseSuccess($response, 'update privacy settings (typing + read_receipts)');

        $user = $response->getData()->users[$userID];
        self::assertNotNull($user->privacySettings);
        self::assertTrue($user->privacySettings->typingIndicators->enabled);
        self::assertFalse($user->privacySettings->readReceipts->enabled);
    }

    /**
     * @test
     */
    public function testPartialUpdatePrivacySettings(): void
    {
        $userIDs = $this->createTestUsers(1);
        $userID = $userIDs[0];

        // Partial update 1: Set typing_indicators enabled
        $response = $this->client->updateUsersPartial(new GeneratedModels\UpdateUsersPartialRequest(
            users: [
                new GeneratedModels\UpdateUserPartialRequest(
                    id: $userID,
                    set: (object) [
                        'privacy_settings' => (object) [
                            'typing_indicators' => (object) ['enabled' => true],
                        ],
                    ],
                ),
            ],
        ));
        $this->assertResponseSuccess($response, 'partial update privacy (typing)');

        $user = $response->getData()->users[$userID];
        self::assertNotNull($user->privacySettings);
        self::assertTrue($user->privacySettings->typingIndicators->enabled);

        // Partial update 2: Set read_receipts disabled (typing should remain)
        $response = $this->client->updateUsersPartial(new GeneratedModels\UpdateUsersPartialRequest(
            users: [
                new GeneratedModels\UpdateUserPartialRequest(
                    id: $userID,
                    set: (object) [
                        'privacy_settings' => (object) [
                            'read_receipts' => (object) ['enabled' => false],
                        ],
                    ],
                ),
            ],
        ));
        $this->assertResponseSuccess($response, 'partial update privacy (read_receipts)');

        $user = $response->getData()->users[$userID];
        self::assertNotNull($user->privacySettings);
        self::assertTrue($user->privacySettings->typingIndicators->enabled, 'Typing indicators should still be enabled');
        self::assertFalse($user->privacySettings->readReceipts->enabled);
    }

    /**
     * @test
     */
    public function testQueryUsersWithDeactivated(): void
    {
        $userIDs = $this->createTestUsers(3);

        // Deactivate the third user
        $this->client->deactivateUser($userIDs[2], new GeneratedModels\DeactivateUserRequest());

        // Query without include_deactivated — should find only 2
        $response = $this->client->queryUsers(new GeneratedModels\QueryUsersPayload(
            filterConditions: (object) ['id' => (object) ['$in' => $userIDs]],
        ));
        $this->assertResponseSuccess($response, 'query users without deactivated');
        self::assertCount(2, $response->getData()->users, 'Should find 2 active users');

        // Query with include_deactivated — should find all 3
        $response = $this->client->queryUsers(new GeneratedModels\QueryUsersPayload(
            filterConditions: (object) ['id' => (object) ['$in' => $userIDs]],
            includeDeactivatedUsers: true,
        ));
        $this->assertResponseSuccess($response, 'query users with deactivated');
        self::assertCount(3, $response->getData()->users, 'Should find all 3 users including deactivated');

        // Reactivate for cleanup
        $this->client->reactivateUser($userIDs[2], new GeneratedModels\ReactivateUserRequest());
    }

    /**
     * @test
     */
    public function testDeactivateUsersPlural(): void
    {
        $userIDs = $this->createTestUsers(2);

        // Batch deactivate (async)
        $response = $this->client->deactivateUsers(new GeneratedModels\DeactivateUsersRequest(
            userIds: $userIDs,
        ));
        $this->assertResponseSuccess($response, 'deactivate users (plural)');

        $taskID = $response->getData()->taskID;
        self::assertNotEmpty($taskID, 'Task ID should not be empty');

        $taskResult = $this->waitForTask($taskID);
        self::assertSame('completed', $taskResult->status, 'Deactivate task should complete');

        // Verify both are deactivated — query without flag should return 0
        $queryResp = $this->client->queryUsers(new GeneratedModels\QueryUsersPayload(
            filterConditions: (object) ['id' => (object) ['$in' => $userIDs]],
        ));
        $this->assertResponseSuccess($queryResp, 'query deactivated users');
        self::assertCount(0, $queryResp->getData()->users ?? [], 'No active users should remain');

        // Reactivate for cleanup
        $this->client->reactivateUsers(new GeneratedModels\ReactivateUsersRequest(
            userIds: $userIDs,
        ));
        // Wait for reactivation task
        $reactivateTaskID = $this->client->reactivateUsers(new GeneratedModels\ReactivateUsersRequest(
            userIds: $userIDs,
        ))->getData()->taskID;
        if (!empty($reactivateTaskID)) {
            $this->waitForTask($reactivateTaskID);
        }
    }

    /**
     * @test
     */
    public function testUserCustomData(): void
    {
        $userID = 'test-user-' . uniqid();
        $this->createdUserIDs[] = $userID;

        $customData = (object) [
            'favorite_color' => 'blue',
            'age' => 30,
            'tags' => ['vip', 'early_adopter'],
        ];

        // Create user with custom data
        $response = $this->client->updateUsers(new GeneratedModels\UpdateUsersRequest(
            users: [
                $userID => new GeneratedModels\UserRequest(
                    id: $userID,
                    name: 'Custom Data User ' . $userID,
                    role: 'user',
                    custom: $customData,
                ),
            ],
        ));
        $this->assertResponseSuccess($response, 'create user with custom data');

        $user = $response->getData()->users[$userID];
        self::assertNotNull($user->custom, 'Custom data should be set');

        // Query back to verify persistence
        $queryResp = $this->client->queryUsers(new GeneratedModels\QueryUsersPayload(
            filterConditions: (object) ['id' => (object) ['$eq' => $userID]],
        ));
        $this->assertResponseSuccess($queryResp, 'query user with custom data');
        self::assertCount(1, $queryResp->getData()->users);

        $queriedUser = $queryResp->getData()->users[0];
        self::assertNotNull($queriedUser->custom, 'Custom data should persist after query');
    }
}
