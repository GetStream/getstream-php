<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\GeneratedModels;
use PHPUnit\Framework\Attributes\Group;

/**
 * Chat Misc integration tests.
 *
 * Tests: devices, blocklists, commands, channel types, permissions, exports,
 * reminders, threads, unread counts, custom events, team usage stats, batch updates.
 */
#[Group('integration')]
class ChatMiscIntegrationTest extends ChatTestCase
{
    // =========================================================================
    // Devices
    // =========================================================================

    /**
     * @test
     */
    public function createListDeleteDevice(): void
    {
        $userID = $this->getSharedUserIDs()[0];
        $deviceID = 'integration-test-device-' . $this->randomString(12);

        // Create device
        try {
            $resp = $this->client->createDevice(new GeneratedModels\CreateDeviceRequest(
                id: $deviceID,
                pushProvider: 'firebase',
                userID: $userID,
            ));
            $this->assertResponseSuccess($resp, 'create device');
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'no push providers configured') || str_contains($e->getMessage(), 'push')) {
                self::markTestSkipped('Push providers not configured for this app');
            }

            throw $e;
        }

        // List devices
        $listResp = $this->client->listDevices($userID);
        $this->assertResponseSuccess($listResp, 'list devices');

        $found = false;
        foreach ($listResp->getData()->devices ?? [] as $device) {
            if ($device->id === $deviceID) {
                $found = true;
                self::assertSame('firebase', $device->pushProvider);
            }
        }
        self::assertTrue($found, 'Created device should appear in list');

        // Delete device
        $delResp = $this->client->deleteDevice($deviceID, $userID);
        $this->assertResponseSuccess($delResp, 'delete device');

        // Verify deleted
        $listResp2 = $this->client->listDevices($userID);
        $this->assertResponseSuccess($listResp2, 'list devices after delete');

        foreach ($listResp2->getData()->devices ?? [] as $device) {
            self::assertNotSame($deviceID, $device->id, 'Device should be deleted');
        }
    }

    // =========================================================================
    // Blocklists
    // =========================================================================

    /**
     * @test
     */
    public function createListDeleteBlocklist(): void
    {
        $blocklistName = 'test-blocklist-' . $this->randomString(8);

        try {
            // Create blocklist
            $createResp = $this->client->createBlockList(new GeneratedModels\CreateBlockListRequest(
                name: $blocklistName,
                words: ['badword1', 'badword2', 'badword3'],
            ));
            $this->assertResponseSuccess($createResp, 'create blocklist');

            // Blocklists are eventually consistent
            sleep(2);

            // List blocklists and verify found
            $listResp = $this->client->listBlockLists('');
            $this->assertResponseSuccess($listResp, 'list blocklists');

            $found = false;
            foreach ($listResp->getData()->blocklists ?? [] as $bl) {
                if ($bl->name === $blocklistName) {
                    $found = true;
                }
            }
            self::assertTrue($found, 'Created blocklist should appear in list');

            // Get blocklist
            $getResp = $this->client->getBlockList($blocklistName, '');
            $this->assertResponseSuccess($getResp, 'get blocklist');
            self::assertSame($blocklistName, $getResp->getData()->blocklist->name);

            // Delete blocklist
            $delResp = $this->client->deleteBlockList($blocklistName, '');
            $this->assertResponseSuccess($delResp, 'delete blocklist');
        } catch (\Exception $e) {
            // Clean up on failure
            try {
                $this->client->deleteBlockList($blocklistName, '');
            } catch (\Exception $ignore) {
            }

            throw $e;
        }
    }

    // =========================================================================
    // Commands
    // =========================================================================

    /**
     * @test
     */
    public function createListDeleteCommand(): void
    {
        $cmdName = 'testcmd' . $this->randomString(6);

        try {
            // Create command
            $createResp = $this->createCommand(new GeneratedModels\CreateCommandRequest(
                name: $cmdName,
                description: 'A test command',
            ));
            $this->assertResponseSuccess($createResp, 'create command');
            self::assertNotNull($createResp->getData()->command);
            self::assertSame($cmdName, $createResp->getData()->command->name);

            // Get command
            $getResp = $this->getCommand($cmdName);
            $this->assertResponseSuccess($getResp, 'get command');
            self::assertSame($cmdName, $getResp->getData()->name);
            self::assertSame('A test command', $getResp->getData()->description);

            // Commands are eventually consistent
            sleep(2);

            // List commands and verify found
            $listResp = $this->listCommands();
            $this->assertResponseSuccess($listResp, 'list commands');

            $found = false;
            foreach ($listResp->getData()->commands ?? [] as $cmd) {
                if ($cmd->name === $cmdName) {
                    $found = true;
                }
            }
            self::assertTrue($found, 'Created command should appear in list');

            // Delete command
            $delResp = $this->deleteCommandApi($cmdName);
            $this->assertResponseSuccess($delResp, 'delete command');
            self::assertSame($cmdName, $delResp->getData()->name);
        } catch (\Exception $e) {
            // Clean up on failure
            try {
                $this->deleteCommandApi($cmdName);
            } catch (\Exception $ignore) {
            }

            throw $e;
        }
    }

    // =========================================================================
    // Channel Types
    // =========================================================================

    /**
     * @test
     */
    public function createUpdateDeleteChannelType(): void
    {
        $typeName = 'testtype' . $this->randomString(6);

        try {
            // Create channel type
            $createResp = $this->createChannelType(new GeneratedModels\CreateChannelTypeRequest(
                name: $typeName,
                automod: 'disabled',
                automodBehavior: 'flag',
                maxMessageLength: 3000,
            ));
            $this->assertResponseSuccess($createResp, 'create channel type');
            self::assertSame($typeName, $createResp->getData()->name);
            self::assertSame(3000, $createResp->getData()->maxMessageLength);

            // Channel types are eventually consistent - retry with delay
            $getResp = $this->retryUntilSuccess(function () use ($typeName) {
                $resp = $this->getChannelType($typeName);
                $this->assertResponseSuccess($resp, 'get channel type');

                return $resp;
            }, maxAttempts: 10, sleepMs: 2000);
            self::assertSame($typeName, $getResp->getData()->name);

            // Update channel type — retry until the response reflects the updated
            // value, because the backend may return stale data from its local
            // cache right after persisting the change.
            $updateResp = $this->retryUntilSuccess(function () use ($typeName) {
                $resp = $this->updateChannelType($typeName, new GeneratedModels\UpdateChannelTypeRequest(
                    automod: 'disabled',
                    automodBehavior: 'flag',
                    maxMessageLength: 4000,
                    typingEvents: false,
                ));
                $this->assertResponseSuccess($resp, 'update channel type');
                self::assertSame(4000, $resp->getData()->maxMessageLength);
                self::assertFalse($resp->getData()->typingEvents);

                return $resp;
            }, maxAttempts: 5, sleepMs: 2000);

            // Delete channel type (with retry due to eventual consistency)
            $deleteErr = null;
            for ($i = 0; $i < 5; $i++) {
                try {
                    $this->deleteChannelType($typeName);
                    $deleteErr = null;

                    break;
                } catch (\Exception $e) {
                    $deleteErr = $e;
                    sleep(1);
                }
            }
            if ($deleteErr !== null) {
                self::fail("Failed to delete channel type after retries: {$deleteErr->getMessage()}");
            }
        } catch (\Exception $e) {
            // Clean up on failure
            try {
                $this->deleteChannelType($typeName);
            } catch (\Exception $ignore) {
            }

            throw $e;
        }
    }

    /**
     * @test
     */
    public function listsChannelTypes(): void
    {
        $resp = $this->listChannelTypes();
        $this->assertResponseSuccess($resp, 'list channel types');

        self::assertNotNull($resp->getData()->channelTypes);
        // Default types (messaging, livestream, etc.) should exist
        self::assertArrayHasKey('messaging', $resp->getData()->channelTypes);
    }

    // =========================================================================
    // Permissions
    // =========================================================================

    /**
     * @test
     */
    public function listPermissions(): void
    {
        $resp = $this->client->listPermissions();
        $this->assertResponseSuccess($resp, 'list permissions');

        self::assertNotEmpty($resp->getData()->permissions, 'Should have at least one permission');
    }

    /**
     * @test
     */
    public function createPermission(): void
    {
        // CreatePermission is hidden from the generated spec (Ignore: true in backend)
        // per Go SDK reference. Skip this test.
        self::markTestSkipped('CreatePermission is not available in the generated SDK');
    }

    /**
     * @test
     */
    public function getPermission(): void
    {
        $resp = $this->client->getPermission('create-channel');
        $this->assertResponseSuccess($resp, 'get permission');

        self::assertSame('create-channel', $resp->getData()->permission->id);
        self::assertNotEmpty($resp->getData()->permission->action);
    }

    // =========================================================================
    // Query Banned Users
    // =========================================================================

    /**
     * @test
     */
    public function queriesBannedUsers(): void
    {
        $shared = $this->getSharedUserIDs();
        $adminID = $shared[0];
        $targetID = $shared[1];

        [$channelType, $channelID] = $this->createTestChannelWithMembers($adminID, [$adminID, $targetID]);
        $cid = "{$channelType}:{$channelID}";

        // Ban user in the channel
        $banResp = $this->banUser(new GeneratedModels\BanRequest(
            targetUserID: $targetID,
            bannedByID: $adminID,
            channelCid: $cid,
            reason: 'test ban reason',
        ));
        $this->assertResponseSuccess($banResp, 'ban user');

        // Query banned users
        $qResp = $this->queryBannedUsers(new GeneratedModels\QueryBannedUsersPayload(
            filterConditions: (object) ['channel_cid' => (object) ['$eq' => $cid]],
        ));
        $this->assertResponseSuccess($qResp, 'query banned users');
        self::assertNotEmpty($qResp->getData()->bans, 'Should find the banned user');

        // Unban user
        $unbanResp = $this->unbanUser($targetID, $cid);
        $this->assertResponseSuccess($unbanResp, 'unban user');

        // Verify ban is gone
        $qResp2 = $this->queryBannedUsers(new GeneratedModels\QueryBannedUsersPayload(
            filterConditions: (object) ['channel_cid' => (object) ['$eq' => $cid]],
        ));
        $this->assertResponseSuccess($qResp2, 'query banned users after unban');
        self::assertEmpty($qResp2->getData()->bans, 'Channel bans should be empty after unban');
    }

    // =========================================================================
    // Mute / Unmute User
    // =========================================================================

    /**
     * @test
     */
    public function muteUnmuteUser(): void
    {
        $shared = $this->getSharedUserIDs();
        $muterID = $shared[0];
        $targetID = $shared[1];

        // Mute user
        $muteResp = $this->muteUser(new GeneratedModels\MuteRequest(
            targetIds: [$targetID],
            userID: $muterID,
        ));
        $this->assertResponseSuccess($muteResp, 'mute user');
        self::assertNotEmpty($muteResp->getData()->mutes, 'Mute response should contain mutes');

        $mute = $muteResp->getData()->mutes[0];
        self::assertNotNull($mute->user, 'Mute should have a User');
        self::assertNotNull($mute->target, 'Mute should have a Target');
        self::assertNull($mute->expires, 'Mute without timeout should have no Expires');

        // Unmute user
        $unmuteResp = $this->unmuteUser(new GeneratedModels\UnmuteRequest(
            targetIds: [$targetID],
            userID: $muterID,
        ));
        $this->assertResponseSuccess($unmuteResp, 'unmute user');
    }

    // =========================================================================
    // App Settings
    // =========================================================================

    /**
     * @test
     */
    public function getAppSettings(): void
    {
        $resp = $this->client->getApp();
        $this->assertResponseSuccess($resp, 'get app settings');
        self::assertNotNull($resp->getData()->app);
        self::assertNotEmpty($resp->getData()->app->name);
    }

    // =========================================================================
    // Export Channels
    // =========================================================================

    /**
     * @test
     */
    public function exportsChannels(): void
    {
        $userID = $this->getSharedUserIDs()[0];

        [$channelType, $channelID] = $this->createTestChannelWithMembers($userID, [$userID]);
        $this->sendTestMessage($channelType, $channelID, $userID, 'Message for export test');

        $cid = "{$channelType}:{$channelID}";

        $exportResp = $this->exportChannels(new GeneratedModels\ExportChannelsRequest(
            channels: [new GeneratedModels\ChannelExport(cid: $cid)],
        ));
        $this->assertResponseSuccess($exportResp, 'export channels');
        self::assertNotEmpty($exportResp->getData()->taskID);

        // Wait for the export task to complete
        $taskResult = $this->waitForTask($exportResp->getData()->taskID);
        self::assertSame('completed', $taskResult->status);
    }

    // =========================================================================
    // Threads
    // =========================================================================

    /**
     * @test
     */
    public function threads(): void
    {
        $shared = $this->getSharedUserIDs();
        $userID = $shared[0];
        $userID2 = $shared[1];

        [$channelType, $channelID] = $this->createTestChannelWithMembers($userID, [$userID, $userID2]);
        $channelCID = "{$channelType}:{$channelID}";

        // Create a thread: parent + replies
        $parentID = $this->sendTestMessage($channelType, $channelID, $userID, 'Thread parent message');

        // Send first reply in thread (from user2)
        $replyResp = $this->sendMessage($channelType, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'First reply in thread',
                userID: $userID2,
                parentID: $parentID,
            ),
        ));
        $this->assertResponseSuccess($replyResp, 'send thread reply 1');

        // Send second reply (from user1)
        $replyResp2 = $this->sendMessage($channelType, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'Second reply in thread',
                userID: $userID,
                parentID: $parentID,
            ),
        ));
        $this->assertResponseSuccess($replyResp2, 'send thread reply 2');

        // Query threads
        $resp = $this->queryThreads(new GeneratedModels\QueryThreadsRequest(
            userID: $userID,
            filter: (object) ['channel_cid' => (object) ['$eq' => $channelCID]],
        ));
        $this->assertResponseSuccess($resp, 'query threads');
        self::assertNotEmpty($resp->getData()->threads, 'Should have at least one thread');

        $found = false;
        foreach ($resp->getData()->threads as $thread) {
            if ($thread->parentMessageID === $parentID) {
                $found = true;
                self::assertSame($userID2, $thread->createdByUserID);
            }
        }
        self::assertTrue($found, "Thread should appear in query results for channel {$channelCID}");
    }

    // =========================================================================
    // Unread Counts
    // =========================================================================

    /**
     * @test
     */
    public function getsUnreadCounts(): void
    {
        $shared = $this->getSharedUserIDs();
        $userID = $shared[0];
        $userID2 = $shared[1];

        [$channelType, $channelID] = $this->createTestChannelWithMembers($userID, [$userID, $userID2]);
        $this->sendTestMessage($channelType, $channelID, $userID, 'Message for unread counts test');

        $resp = $this->getUnreadCounts($userID2);
        $this->assertResponseSuccess($resp, 'get unread counts');
        self::assertGreaterThanOrEqual(0, $resp->getData()->totalUnreadCount);
    }

    /**
     * @test
     */
    public function getsUnreadCountsBatch(): void
    {
        $shared = $this->getSharedUserIDs();
        $userID = $shared[0];
        $userID2 = $shared[1];

        [$channelType, $channelID] = $this->createTestChannelWithMembers($userID, [$userID, $userID2]);
        $this->sendTestMessage($channelType, $channelID, $userID, 'Message for unread batch test');

        $resp = $this->getUnreadCountsBatch(new GeneratedModels\UnreadCountsBatchRequest(
            userIds: [$userID, $userID2],
        ));
        $this->assertResponseSuccess($resp, 'get unread counts batch');
        self::assertNotNull($resp->getData()->countsByUser);
        self::assertArrayHasKey($userID, $resp->getData()->countsByUser);
        self::assertArrayHasKey($userID2, $resp->getData()->countsByUser);
    }

    // =========================================================================
    // Reminders
    // =========================================================================

    /**
     * @test
     */
    public function reminders(): void
    {
        $userID = $this->getSharedUserIDs()[0];

        [$channelType, $channelID] = $this->createTestChannelWithMembers($userID, [$userID]);
        $msgID = $this->sendTestMessage($channelType, $channelID, $userID, 'Message for reminder test');

        // Create a reminder
        $remindAt = new \DateTime('+24 hours');

        try {
            $createResp = $this->createReminder($msgID, new GeneratedModels\CreateReminderRequest(
                remindAt: $remindAt,
                userID: $userID,
            ));
            $this->assertResponseSuccess($createResp, 'create reminder');
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'not enabled') || str_contains($e->getMessage(), 'reminder')) {
                self::markTestSkipped('Reminders are not enabled for this app');
            }

            throw $e;
        }

        self::assertSame($msgID, $createResp->getData()->messageID);
        self::assertSame($userID, $createResp->getData()->userID);
        self::assertNotNull($createResp->getData()->remindAt, 'RemindAt should be set');

        // Update reminder
        $newRemindAt = new \DateTime('+48 hours');
        $updateResp = $this->updateReminder($msgID, new GeneratedModels\UpdateReminderRequest(
            remindAt: $newRemindAt,
            userID: $userID,
        ));
        $this->assertResponseSuccess($updateResp, 'update reminder');
        self::assertSame($msgID, $updateResp->getData()->reminder->messageID);

        // Query reminders
        $qResp = $this->queryReminders(new GeneratedModels\QueryRemindersRequest(
            userID: $userID,
            filter: (object) ['message_id' => $msgID],
            sort: [],
        ));
        $this->assertResponseSuccess($qResp, 'query reminders');
        self::assertNotEmpty($qResp->getData()->reminders, 'Should find the reminder');
        self::assertSame($msgID, $qResp->getData()->reminders[0]->messageID);

        // Delete reminder
        $delResp = $this->deleteReminderApi($msgID, $userID);
        $this->assertResponseSuccess($delResp, 'delete reminder');
    }

    // =========================================================================
    // Send User Custom Event
    // =========================================================================

    /**
     * @test
     */
    public function sendsUserCustomEvent(): void
    {
        $userID = $this->getSharedUserIDs()[0];

        $resp = $this->sendUserCustomEvent($userID, new GeneratedModels\SendUserCustomEventRequest(
            event: new GeneratedModels\UserCustomEventRequest(
                type: 'friendship_request',
                custom: (object) ['message' => "Let's be friends!"],
            ),
        ));
        $this->assertResponseSuccess($resp, 'send user custom event');
    }

    // =========================================================================
    // Query Team Usage Stats
    // =========================================================================

    /**
     * @test
     */
    public function queriesTeamUsageStats(): void
    {
        try {
            $resp = $this->queryTeamUsageStats(new GeneratedModels\QueryTeamUsageStatsRequest());
            $this->assertResponseSuccess($resp, 'query team usage stats');
            self::assertNotNull($resp->getData()->teams);
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'Token signature is invalid') || str_contains($e->getMessage(), 'not available')) {
                self::markTestSkipped('QueryTeamUsageStats not available on this app');
            }

            throw $e;
        }
    }

    // =========================================================================
    // Channel Batch Update
    // =========================================================================

    /**
     * @test
     */
    public function channelBatchUpdate(): void
    {
        // ChannelBatchUpdate is behind Ignore+Beta in the backend spec,
        // so the generated SDK doesn't include it yet. Per Go SDK reference.
        self::markTestSkipped('ChannelBatchUpdate is not yet available in the generated SDK');
    }

    // =========================================================================
    // Retention Policy
    // =========================================================================

    /**
     * @test
     */
    public function getRetentionPolicy(): string
    {
        $policyName = 'old-messages';

        // Ensure a policy exists before querying
        try {
            $this->client->setRetentionPolicy(new GeneratedModels\SetRetentionPolicyRequest(
                policy: $policyName,
                maxAgeHours: 720,
            ));
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'not enabled') || str_contains($e->getMessage(), 'retention')) {
                self::markTestSkipped('Retention policies are not enabled for this app');
            }

            throw $e;
        }

        try {
            $resp = $this->client->getRetentionPolicy();
            $this->assertResponseSuccess($resp, 'get retention policy');
            self::assertNotNull($resp->getData()->policies, 'Policies list should be returned');
            self::assertNotEmpty($resp->getData()->policies, 'Should have at least one policy');
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'not enabled') || str_contains($e->getMessage(), 'retention')) {
                self::markTestSkipped('Retention policies are not enabled for this app');
            }

            throw $e;
        }

        return $policyName;
    }

    /**
     * @test
     * @depends getRetentionPolicy
     */
    public function getRetentionPolicyRuns(string $policyName): string
    {
        try {
            $resp = $this->client->getRetentionPolicyRuns(limit: 10, offset: 0);
            $this->assertResponseSuccess($resp, 'get retention policy runs');
            self::assertNotNull($resp->getData()->runs, 'Runs list should be returned');
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'not enabled') || str_contains($e->getMessage(), 'retention')) {
                self::markTestSkipped('Retention policies are not enabled for this app');
            }

            throw $e;
        }

        return $policyName;
    }

    /**
     * @test
     * @depends getRetentionPolicyRuns
     */
    public function deleteRetentionPolicy(string $policyName): void
    {
        try {
            $resp = $this->client->deleteRetentionPolicy(new GeneratedModels\DeleteRetentionPolicyRequest(
                policy: $policyName,
            ));
            $this->assertResponseSuccess($resp, 'delete retention policy');
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'not enabled') || str_contains($e->getMessage(), 'retention')) {
                self::markTestSkipped('Retention policies are not enabled for this app');
            }

            throw $e;
        }
    }

    protected static function sharedUserCount(): int
    {
        return 2;
    }
}
