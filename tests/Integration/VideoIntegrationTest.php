<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\GeneratedModels;
use PHPUnit\Framework\Attributes\Group;

/**
 * Video integration tests.
 *
 * Ports tests from getstream-go/client_test.go (video section).
 * All tests use makeRequest() wrappers since the PHP SDK lacks a VideoClient.
 */
#[Group('integration')]
class VideoIntegrationTest extends ChatTestCase
{
    protected function tearDown(): void
    {
        $this->cleanupVideoResources();
        parent::tearDown();
    }

    /**
     * Helper: create a unique call type and track for cleanup.
     */
    private function createTrackedCallType(string $name): GeneratedModels\CreateCallTypeResponse
    {
        // Clean up excess call types first (same pattern as Go SDK)
        try {
            $listResp = $this->listCallTypesVideo();
            if ($listResp->isSuccessful() && $listResp->getData()->callTypes !== null && count($listResp->getData()->callTypes) > 10) {
                $builtIn = ['default', 'livestream', 'audio_room', 'development'];
                foreach ($listResp->getData()->callTypes as $ctName => $ct) {
                    if (!in_array($ctName, $builtIn, true)) {
                        try {
                            $this->deleteCallTypeVideo($ctName);
                        } catch (\Exception $e) {
                            // Ignore
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            // Ignore list errors
        }

        $response = $this->createCallTypeVideo(new GeneratedModels\CreateCallTypeRequest(
            name: $name,
            grants: [
                'admin' => ['send-audio', 'send-video', 'mute-users'],
                'user' => ['send-audio', 'send-video'],
            ],
            settings: new GeneratedModels\CallSettingsRequest(
                audio: new GeneratedModels\AudioSettingsRequest(
                    defaultDevice: 'speaker',
                    micDefaultOn: true,
                ),
                screensharing: new GeneratedModels\ScreensharingSettingsRequest(
                    accessRequestEnabled: false,
                    enabled: true,
                ),
            ),
            notificationSettings: new GeneratedModels\NotificationSettingsRequest(
                enabled: true,
                callNotification: new GeneratedModels\EventNotificationSettingsRequest(
                    enabled: true,
                    apns: new GeneratedModels\APNSPayload(
                        title: '{{ user.display_name }} invites you to a call',
                        body: '',
                    ),
                ),
                sessionStarted: new GeneratedModels\EventNotificationSettingsRequest(
                    enabled: false,
                    apns: new GeneratedModels\APNSPayload(
                        title: '{{ user.display_name }} invites you to a call',
                        body: '',
                    ),
                ),
                callLiveStarted: new GeneratedModels\EventNotificationSettingsRequest(
                    enabled: false,
                    apns: new GeneratedModels\APNSPayload(
                        title: '{{ user.display_name }} invites you to a call',
                        body: '',
                    ),
                ),
                callRing: new GeneratedModels\EventNotificationSettingsRequest(
                    enabled: false,
                    apns: new GeneratedModels\APNSPayload(
                        title: '{{ user.display_name }} invites you to a call',
                        body: '',
                    ),
                ),
            ),
        ));
        $this->assertResponseSuccess($response, 'create call type');
        $this->createdCallTypes[] = $name;
        return $response->getData();
    }

    // =========================================================================
    // Tests
    // =========================================================================

    /**
     * CRUDCallTypeOperations: Create call type with settings, update, read, delete.
     */
    public function testCRUDCallTypeOperations(): void
    {
        $callTypeName = 'calltype-' . $this->randomString(10);
        $data = $this->createTrackedCallType($callTypeName);

        // Verify creation
        $this->assertEquals($callTypeName, $data->name);
        $this->assertTrue($data->settings->audio->micDefaultOn);
        $this->assertEquals('speaker', $data->settings->audio->defaultDevice);
        $this->assertFalse($data->settings->screensharing->accessRequestEnabled);
        $this->assertTrue($data->settings->screensharing->enabled);
        $this->assertTrue($data->notificationSettings->enabled);
        $this->assertTrue($data->notificationSettings->callNotification->enabled);
        $this->assertFalse($data->notificationSettings->sessionStarted->enabled);

        // Update call type settings
        $updateResp = $this->updateCallTypeVideo($callTypeName, new GeneratedModels\UpdateCallTypeRequest(
            settings: new GeneratedModels\CallSettingsRequest(
                audio: new GeneratedModels\AudioSettingsRequest(
                    defaultDevice: 'earpiece',
                    micDefaultOn: false,
                ),
                recording: new GeneratedModels\RecordSettingsRequest(
                    mode: 'disabled',
                ),
                backstage: new GeneratedModels\BackstageSettingsRequest(
                    enabled: true,
                ),
            ),
            grants: [
                'host' => ['join-backstage'],
            ],
        ));
        $this->assertResponseSuccess($updateResp, 'update call type');
        $updated = $updateResp->getData();
        $this->assertFalse($updated->settings->audio->micDefaultOn);
        $this->assertEquals('earpiece', $updated->settings->audio->defaultDevice);
        $this->assertEquals('disabled', $updated->settings->recording->mode);
        $this->assertTrue($updated->settings->backstage->enabled);

        // Read call type
        $getResp = $this->getCallTypeVideo($callTypeName);
        $this->assertResponseSuccess($getResp, 'get call type');
        $this->assertEquals($callTypeName, $getResp->getData()->name);

        // Delete call type (handled by cleanup, but verify it works)
        $delResp = $this->deleteCallTypeVideo($callTypeName);
        $this->assertResponseSuccess($delResp, 'delete call type');

        // Remove from tracked list since we already deleted it
        $this->createdCallTypes = array_filter($this->createdCallTypes, fn($n) => $n !== $callTypeName);
    }

    /**
     * CreateCallWithMembers: Create call, add members.
     */
    public function testCreateCallWithMembers(): void
    {
        $userIDs = $this->createTestUsers(2);
        $callID = 'test-call-' . $this->randomString(10);

        $response = $this->getOrCreateCall('default', $callID, new GeneratedModels\GetOrCreateCallRequest(
            data: new GeneratedModels\CallRequest(
                createdByID: $userIDs[0],
                members: [
                    new GeneratedModels\MemberRequest(userID: $userIDs[0]),
                    new GeneratedModels\MemberRequest(userID: $userIDs[1]),
                ],
            ),
        ));
        $this->assertResponseSuccess($response, 'create call with members');
        $this->createdCalls[] = ['type' => 'default', 'id' => $callID];

        $data = $response->getData();
        $this->assertNotNull($data->call);
        $this->assertNotNull($data->members);
        $this->assertCount(2, $data->members);
    }

    /**
     * BlockUnblockUserFromCalls: Block user from call, verify; unblock.
     */
    public function testBlockUnblockUserFromCalls(): void
    {
        $userIDs = $this->createTestUsers(2);
        $callID = 'test-call-' . $this->randomString(10);

        // Create call
        $this->createTrackedCall('default', $callID, $userIDs[0]);

        // Block user
        $blockResp = $this->blockUserInCall('default', $callID, new GeneratedModels\BlockUserRequest(
            userID: $userIDs[1],
        ));
        $this->assertResponseSuccess($blockResp, 'block user');

        // Verify blocked
        $getResp = $this->getCall('default', $callID);
        $this->assertResponseSuccess($getResp, 'get call after block');
        $this->assertContains($userIDs[1], $getResp->getData()->call->blockedUserIds);

        // Unblock user
        $unblockResp = $this->unblockUserInCall('default', $callID, new GeneratedModels\UnblockUserRequest(
            userID: $userIDs[1],
        ));
        $this->assertResponseSuccess($unblockResp, 'unblock user');

        // Verify unblocked
        $getResp2 = $this->getCall('default', $callID);
        $this->assertResponseSuccess($getResp2, 'get call after unblock');
        $blocked = $getResp2->getData()->call->blockedUserIds ?? [];
        $this->assertNotContains($userIDs[1], $blocked);
    }

    /**
     * SendCustomEvent: Send custom event in a call.
     */
    public function testSendCustomEvent(): void
    {
        $userIDs = $this->createTestUsers(1);
        $callID = 'test-call-' . $this->randomString(10);

        $this->createTrackedCall('default', $callID, $userIDs[0]);

        $resp = $this->sendCallEvent('default', $callID, new GeneratedModels\SendCallEventRequest(
            userID: $userIDs[0],
            custom: (object) ['bananas' => 'good'],
        ));
        $this->assertResponseSuccess($resp, 'send custom event');
    }

    /**
     * MuteAll: Mute all users in a call.
     */
    public function testMuteAll(): void
    {
        $userIDs = $this->createTestUsers(1);
        $callID = 'test-call-' . $this->randomString(10);

        $this->createTrackedCall('default', $callID, $userIDs[0]);

        $resp = $this->muteUsersInCall('default', $callID, new GeneratedModels\MuteUsersRequest(
            mutedByID: $userIDs[0],
            muteAllUsers: true,
            audio: true,
        ));
        $this->assertResponseSuccess($resp, 'mute all');
    }

    /**
     * MuteSomeUsers: Mute specific users (audio, video, screenshare).
     */
    public function testMuteSomeUsers(): void
    {
        $userIDs = $this->createTestUsers(3);
        $callID = 'test-call-' . $this->randomString(10);

        $this->createTrackedCall('default', $callID, $userIDs[0]);

        $resp = $this->muteUsersInCall('default', $callID, new GeneratedModels\MuteUsersRequest(
            mutedByID: $userIDs[0],
            userIds: [$userIDs[1], $userIDs[2]],
            audio: true,
            video: true,
            screenshare: true,
            screenshareAudio: true,
        ));
        $this->assertResponseSuccess($resp, 'mute some users');
    }

    /**
     * UpdateUserPermissions: Revoke/grant permissions in a call.
     */
    public function testUpdateUserPermissions(): void
    {
        $userIDs = $this->createTestUsers(2);
        $callID = 'test-call-' . $this->randomString(10);

        $this->createTrackedCall('default', $callID, $userIDs[0]);

        // Revoke
        $revokeResp = $this->updateUserPermissionsInCall('default', $callID, new GeneratedModels\UpdateUserPermissionsRequest(
            userID: $userIDs[1],
            revokePermissions: ['send-audio'],
        ));
        $this->assertResponseSuccess($revokeResp, 'revoke permissions');

        // Grant
        $grantResp = $this->updateUserPermissionsInCall('default', $callID, new GeneratedModels\UpdateUserPermissionsRequest(
            userID: $userIDs[1],
            grantPermissions: ['send-audio'],
        ));
        $this->assertResponseSuccess($grantResp, 'grant permissions');
    }

    /**
     * DeactivateUser: Deactivate/reactivate users, batch deactivate.
     */
    public function testDeactivateUser(): void
    {
        $userIDs = $this->createTestUsers(2);

        // Deactivate single user
        $deactResp = $this->client->deactivateUser($userIDs[0], new GeneratedModels\DeactivateUserRequest());
        $this->assertResponseSuccess($deactResp, 'deactivate user');

        // Reactivate
        $reactResp = $this->client->reactivateUser($userIDs[0], new GeneratedModels\ReactivateUserRequest());
        $this->assertResponseSuccess($reactResp, 'reactivate user');

        // Batch deactivate (async)
        $batchResp = $this->client->deactivateUsers(new GeneratedModels\DeactivateUsersRequest(
            userIds: $userIDs,
        ));
        $this->assertResponseSuccess($batchResp, 'batch deactivate users');
        $taskID = $batchResp->getData()->taskID;
        $this->assertNotEmpty($taskID);

        $taskResult = $this->waitForTask($taskID);
        $this->assertEquals('completed', $taskResult->status);
    }

    /**
     * CreateCallWithSessionTimer: Create call with max_duration_seconds, update.
     */
    public function testCreateCallWithSessionTimer(): void
    {
        $userIDs = $this->createTestUsers(1);
        $callID = 'test-call-' . $this->randomString(10);

        // Create call with session timer
        $response = $this->getOrCreateCall('default', $callID, new GeneratedModels\GetOrCreateCallRequest(
            data: new GeneratedModels\CallRequest(
                createdByID: $userIDs[0],
                settingsOverride: new GeneratedModels\CallSettingsRequest(
                    limits: new GeneratedModels\LimitsSettingsRequest(
                        maxDurationSeconds: 3600,
                    ),
                ),
            ),
        ));
        $this->assertResponseSuccess($response, 'create call with session timer');
        $this->createdCalls[] = ['type' => 'default', 'id' => $callID];
        $this->assertEquals(3600, $response->getData()->call->settings->limits->maxDurationSeconds);

        // Update to 7200
        $updateResp = $this->updateCall('default', $callID, new GeneratedModels\UpdateCallRequest(
            settingsOverride: new GeneratedModels\CallSettingsRequest(
                limits: new GeneratedModels\LimitsSettingsRequest(
                    maxDurationSeconds: 7200,
                ),
            ),
        ));
        $this->assertResponseSuccess($updateResp, 'update session timer');
        $this->assertEquals(7200, $updateResp->getData()->call->settings->limits->maxDurationSeconds);

        // Reset to 0
        $resetResp = $this->updateCall('default', $callID, new GeneratedModels\UpdateCallRequest(
            settingsOverride: new GeneratedModels\CallSettingsRequest(
                limits: new GeneratedModels\LimitsSettingsRequest(
                    maxDurationSeconds: 0,
                ),
            ),
        ));
        $this->assertResponseSuccess($resetResp, 'reset session timer');
        $this->assertEquals(0, $resetResp->getData()->call->settings->limits->maxDurationSeconds);
    }

    /**
     * UserBlocking: Block/unblock user, verify blocked list.
     */
    public function testUserBlocking(): void
    {
        $userIDs = $this->createTestUsers(2);

        // Block user
        $blockResp = $this->client->blockUsers(new GeneratedModels\BlockUsersRequest(
            blockedUserID: $userIDs[1],
            userID: $userIDs[0],
        ));
        $this->assertResponseSuccess($blockResp, 'block user');

        // Verify blocked
        $getResp = $this->client->getBlockedUsers($userIDs[0]);
        $this->assertResponseSuccess($getResp, 'get blocked users');
        $blocks = $getResp->getData()->blocks;
        $this->assertCount(1, $blocks);
        $this->assertEquals($userIDs[0], $blocks[0]->userID);
        $this->assertEquals($userIDs[1], $blocks[0]->blockedUserID);

        // Unblock
        $unblockResp = $this->client->unblockUsers(new GeneratedModels\UnblockUsersRequest(
            blockedUserID: $userIDs[1],
            userID: $userIDs[0],
        ));
        $this->assertResponseSuccess($unblockResp, 'unblock user');

        // Verify empty
        $getResp2 = $this->client->getBlockedUsers($userIDs[0]);
        $this->assertResponseSuccess($getResp2, 'get blocked users after unblock');
        $this->assertEmpty($getResp2->getData()->blocks);
    }

    /**
     * CreateCallWithBackstageAndJoinAhead: Create call with backstage + join_ahead_time.
     */
    public function testCreateCallWithBackstageAndJoinAhead(): void
    {
        $userIDs = $this->createTestUsers(1);
        $callID = 'test-call-' . $this->randomString(10);
        $startsAt = (new \DateTime())->modify('+30 minutes');

        // Create with backstage + join ahead
        $response = $this->getOrCreateCall('default', $callID, new GeneratedModels\GetOrCreateCallRequest(
            data: new GeneratedModels\CallRequest(
                createdByID: $userIDs[0],
                startsAt: $startsAt,
                settingsOverride: new GeneratedModels\CallSettingsRequest(
                    backstage: new GeneratedModels\BackstageSettingsRequest(
                        enabled: true,
                        joinAheadTimeSeconds: 300,
                    ),
                ),
            ),
        ));
        $this->assertResponseSuccess($response, 'create call with backstage');
        $this->createdCalls[] = ['type' => 'default', 'id' => $callID];
        $this->assertEquals(300, $response->getData()->call->joinAheadTimeSeconds);

        // Update join ahead to 600
        $updateResp = $this->updateCall('default', $callID, new GeneratedModels\UpdateCallRequest(
            settingsOverride: new GeneratedModels\CallSettingsRequest(
                backstage: new GeneratedModels\BackstageSettingsRequest(
                    joinAheadTimeSeconds: 600,
                ),
            ),
        ));
        $this->assertResponseSuccess($updateResp, 'update join ahead time');
        $this->assertEquals(600, $updateResp->getData()->call->joinAheadTimeSeconds);

        // Reset to 0
        $resetResp = $this->updateCall('default', $callID, new GeneratedModels\UpdateCallRequest(
            settingsOverride: new GeneratedModels\CallSettingsRequest(
                backstage: new GeneratedModels\BackstageSettingsRequest(
                    joinAheadTimeSeconds: 0,
                ),
            ),
        ));
        $this->assertResponseSuccess($resetResp, 'reset join ahead time');
        $this->assertEquals(0, $resetResp->getData()->call->joinAheadTimeSeconds);
    }

    /**
     * DeleteCall (soft): Soft delete call, verify not found.
     */
    public function testDeleteCallSoft(): void
    {
        $userIDs = $this->createTestUsers(1);
        $callID = 'test-call-' . $this->randomString(10);

        $this->createTrackedCall('default', $callID, $userIDs[0]);

        // Soft delete
        $delResp = $this->deleteCall('default', $callID, new GeneratedModels\DeleteCallRequest());
        $this->assertResponseSuccess($delResp, 'soft delete call');
        $this->assertNotNull($delResp->getData()->call);
        $this->assertNull($delResp->getData()->taskID);

        // Verify not found
        try {
            $this->getCall('default', $callID);
            $this->fail('Expected error when getting soft-deleted call');
        } catch (\Exception $e) {
            $this->assertStringContainsString("Can't find call with id", $e->getMessage());
        }

        // Remove from tracked list since already deleted
        $this->createdCalls = array_filter($this->createdCalls, fn($c) => $c['id'] !== $callID);
    }

    /**
     * HardDeleteCall: Hard delete with task polling.
     */
    public function testHardDeleteCall(): void
    {
        $userIDs = $this->createTestUsers(1);
        $callID = 'test-call-' . $this->randomString(10);

        $this->createTrackedCall('default', $callID, $userIDs[0]);

        // Hard delete
        $delResp = $this->deleteCall('default', $callID, new GeneratedModels\DeleteCallRequest(
            hard: true,
        ));
        $this->assertResponseSuccess($delResp, 'hard delete call');
        $taskID = $delResp->getData()->taskID;
        $this->assertNotNull($taskID);

        // Wait for task completion
        $taskResult = $this->waitForTask($taskID);
        $this->assertEquals('completed', $taskResult->status);

        // Verify not found
        try {
            $this->getCall('default', $callID);
            $this->fail('Expected error when getting hard-deleted call');
        } catch (\Exception $e) {
            $this->assertStringContainsString("Can't find call with id", $e->getMessage());
        }

        // Remove from tracked list since already deleted
        $this->createdCalls = array_filter($this->createdCalls, fn($c) => $c['id'] !== $callID);
    }

    /**
     * Teams: Create user with teams, create call with team, query.
     */
    public function testTeams(): void
    {
        $userID = 'test-user-' . uniqid();
        $callID = 'test-call-' . $this->randomString(10);

        // Create user with teams
        $this->client->updateUsers(new GeneratedModels\UpdateUsersRequest(
            users: [
                $userID => new GeneratedModels\UserRequest(
                    id: $userID,
                    teams: ['red', 'blue'],
                ),
            ],
        ));
        $this->createdUserIDs[] = $userID;

        // Create call with team
        $response = $this->getOrCreateCall('default', $callID, new GeneratedModels\GetOrCreateCallRequest(
            data: new GeneratedModels\CallRequest(
                createdByID: $userID,
                team: 'blue',
            ),
        ));
        $this->assertResponseSuccess($response, 'create call with team');
        $this->createdCalls[] = ['type' => 'default', 'id' => $callID];
        $this->assertEquals('blue', $response->getData()->call->team);

        // Query users with team filter
        $usersResp = $this->client->queryUsers(new GeneratedModels\QueryUsersPayload(
            filterConditions: (object) [
                'id' => $userID,
                'teams' => (object) ['$in' => ['red', 'blue']],
            ],
        ));
        $this->assertResponseSuccess($usersResp, 'query users with teams');
        $this->assertGreaterThan(0, count($usersResp->getData()->users));
        $foundIDs = array_map(fn($u) => $u->id, $usersResp->getData()->users);
        $this->assertContains($userID, $foundIDs);

        // Query calls with team filter
        $callsResp = $this->queryCalls(new GeneratedModels\QueryCallsRequest(
            filterConditions: (object) [
                'id' => $callID,
                'team' => (object) ['$eq' => 'blue'],
            ],
        ));
        $this->assertResponseSuccess($callsResp, 'query calls with team');
        $this->assertGreaterThan(0, count($callsResp->getData()->calls));
    }

    /**
     * ExternalStorageOperations: Create/list/delete external storage.
     */
    public function testExternalStorageOperations(): void
    {
        $uniqueName = 'test-storage-' . $this->randomString(10);

        // Create external storage
        $createResp = $this->client->createExternalStorage(new GeneratedModels\CreateExternalStorageRequest(
            bucket: 'test-bucket',
            name: $uniqueName,
            storageType: 's3',
            path: 'test-directory/',
            awsS3: new GeneratedModels\S3Request(
                s3Region: 'us-east-1',
                s3APIKey: 'test-access-key',
                s3Secret: 'test-secret',
            ),
        ));
        $this->assertResponseSuccess($createResp, 'create external storage');
        $this->createdExternalStorages[] = $uniqueName;

        // List external storages and verify our new one is in the list
        $listResp = $this->client->listExternalStorage();
        $this->assertResponseSuccess($listResp, 'list external storage');
        $storages = $listResp->getData()->externalStorages;
        $this->assertNotEmpty($storages);

        $found = false;
        foreach ($storages as $storage) {
            if ($storage->name === $uniqueName) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, 'Created external storage should be in the list');

        // Delete
        $delResp = $this->client->deleteExternalStorage($uniqueName);
        $this->assertResponseSuccess($delResp, 'delete external storage');

        // Remove from tracked list
        $this->createdExternalStorages = array_filter($this->createdExternalStorages, fn($n) => $n !== $uniqueName);
    }

    /**
     * EnableCallRecordingAndBackstageMode: Update call settings for recording and backstage.
     */
    public function testEnableCallRecordingAndBackstageMode(): void
    {
        $userIDs = $this->createTestUsers(1);
        $callID = 'test-call-' . $this->randomString(10);

        $this->createTrackedCall('default', $callID, $userIDs[0]);

        // Enable recording
        $recResp = $this->updateCall('default', $callID, new GeneratedModels\UpdateCallRequest(
            settingsOverride: new GeneratedModels\CallSettingsRequest(
                recording: new GeneratedModels\RecordSettingsRequest(
                    mode: 'available',
                    audioOnly: true,
                ),
            ),
        ));
        $this->assertResponseSuccess($recResp, 'enable recording');
        $this->assertEquals('available', $recResp->getData()->call->settings->recording->mode);

        // Enable backstage
        $bsResp = $this->updateCall('default', $callID, new GeneratedModels\UpdateCallRequest(
            settingsOverride: new GeneratedModels\CallSettingsRequest(
                backstage: new GeneratedModels\BackstageSettingsRequest(
                    enabled: true,
                ),
            ),
        ));
        $this->assertResponseSuccess($bsResp, 'enable backstage');
        $this->assertTrue($bsResp->getData()->call->settings->backstage->enabled);
    }

    /**
     * DeleteRecordingsAndTranscriptions: Attempt to delete non-existent recording/transcription (error case).
     */
    public function testDeleteRecordingsAndTranscriptions(): void
    {
        $userIDs = $this->createTestUsers(1);
        $callID = 'test-call-' . $this->randomString(10);

        $this->createTrackedCall('default', $callID, $userIDs[0]);

        // Delete non-existent recording should fail
        try {
            $this->deleteRecording('default', $callID, 'non-existent-session', 'non-existent-filename');
            $this->fail('Expected error when deleting non-existent recording');
        } catch (\Exception $e) {
            // Expected - API returns error for non-existent recording
            $this->assertNotEmpty($e->getMessage());
        }

        // Delete non-existent transcription should fail
        try {
            $this->deleteTranscription('default', $callID, 'non-existent-session', 'non-existent-filename');
            $this->fail('Expected error when deleting non-existent transcription');
        } catch (\Exception $e) {
            // Expected - API returns error for non-existent transcription
            $this->assertNotEmpty($e->getMessage());
        }
    }
}
