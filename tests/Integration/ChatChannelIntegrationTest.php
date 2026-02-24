<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\GeneratedModels;
use GetStream\StreamResponse;

/**
 * Integration tests for Chat Channel operations.
 * Follows the pattern from getstream-go's chat_channel_integration_test.go.
 */
class ChatChannelIntegrationTest extends ChatTestCase
{
    /** @var string[] Shared test user IDs, created once in setUp */
    private array $userIDs = [];
    private string $creatorID;
    private string $memberID1;
    private string $memberID2;
    private string $memberID3;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userIDs = $this->createTestUsers(4);
        $this->creatorID = $this->userIDs[0];
        $this->memberID1 = $this->userIDs[1];
        $this->memberID2 = $this->userIDs[2];
        $this->memberID3 = $this->userIDs[3];
    }

    /**
     * @test
     */
    public function testCreateChannelWithID(): void
    {
        [$type, $channelID] = $this->createTestChannel($this->creatorID);

        $resp = $this->queryChannels(new GeneratedModels\QueryChannelsRequest(
            filterConditions: (object) ['id' => $channelID],
        ));
        $this->assertResponseSuccess($resp, 'query channel by ID');

        $data = $resp->getData();
        self::assertNotEmpty($data->channels);
        self::assertEquals($channelID, $data->channels[0]->channel->id);
        self::assertEquals('messaging', $data->channels[0]->channel->type);
    }

    /**
     * @test
     */
    public function testCreateChannelWithMembers(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1, $this->memberID2],
        );

        $resp = $this->getOrCreateChannel($type, $channelID, new GeneratedModels\ChannelGetOrCreateRequest());
        $this->assertResponseSuccess($resp, 'get channel with members');

        self::assertGreaterThanOrEqual(3, count($resp->getData()->members));
    }

    /**
     * @test
     */
    public function testCreateDistinctChannel(): void
    {
        $members = [
            new GeneratedModels\ChannelMemberRequest(userID: $this->creatorID),
            new GeneratedModels\ChannelMemberRequest(userID: $this->memberID1),
        ];

        $resp1 = $this->getOrCreateDistinctChannel('messaging', new GeneratedModels\ChannelGetOrCreateRequest(
            data: new GeneratedModels\ChannelInput(
                createdByID: $this->creatorID,
                members: $members,
            ),
        ));
        $this->assertResponseSuccess($resp1, 'create distinct channel');
        self::assertNotNull($resp1->getData()->channel);

        // Calling again with same members should return same channel
        $resp2 = $this->getOrCreateDistinctChannel('messaging', new GeneratedModels\ChannelGetOrCreateRequest(
            data: new GeneratedModels\ChannelInput(
                createdByID: $this->creatorID,
                members: $members,
            ),
        ));
        $this->assertResponseSuccess($resp2, 'create distinct channel (second call)');

        self::assertEquals($resp1->getData()->channel->cid, $resp2->getData()->channel->cid);

        // Track for cleanup
        $this->createdChannels[] = ['type' => 'messaging', 'id' => $resp1->getData()->channel->id];
    }

    /**
     * @test
     */
    public function testQueryChannels(): void
    {
        [$type, $channelID] = $this->createTestChannel($this->creatorID);

        $resp = $this->queryChannels(new GeneratedModels\QueryChannelsRequest(
            filterConditions: (object) ['type' => 'messaging', 'id' => $channelID],
        ));
        $this->assertResponseSuccess($resp, 'query channels');

        self::assertNotEmpty($resp->getData()->channels);
        self::assertEquals($channelID, $resp->getData()->channels[0]->channel->id);
    }

    /**
     * @test
     */
    public function testUpdateChannel(): void
    {
        [$type, $channelID] = $this->createTestChannel($this->creatorID);

        $resp = $this->updateChannel($type, $channelID, new GeneratedModels\UpdateChannelRequest(
            data: new GeneratedModels\ChannelInputRequest(
                custom: (object) ['color' => 'blue'],
            ),
            message: new GeneratedModels\MessageRequest(
                text: 'Channel updated!',
                userID: $this->creatorID,
            ),
        ));
        $this->assertResponseSuccess($resp, 'update channel');

        self::assertNotNull($resp->getData()->channel);
        self::assertEquals('blue', $resp->getData()->channel->custom->color ?? null);
    }

    /**
     * @test
     */
    public function testPartialUpdateChannel(): void
    {
        [$type, $channelID] = $this->createTestChannel($this->creatorID);

        // Set fields
        $resp = $this->updateChannelPartial($type, $channelID, new GeneratedModels\UpdateChannelPartialRequest(
            set: (object) [
                'color' => 'red',
                'description' => 'A test channel',
            ],
        ));
        $this->assertResponseSuccess($resp, 'partial update channel (set)');
        self::assertNotNull($resp->getData()->channel);
        self::assertEquals('red', $resp->getData()->channel->custom->color ?? null);

        // Unset fields
        $resp = $this->updateChannelPartial($type, $channelID, new GeneratedModels\UpdateChannelPartialRequest(
            unset: ['color'],
        ));
        $this->assertResponseSuccess($resp, 'partial update channel (unset)');
        self::assertNotNull($resp->getData()->channel);
        $custom = $resp->getData()->channel->custom;
        self::assertTrue(
            $custom === null || !isset($custom->color),
            'color should be unset',
        );
    }

    /**
     * @test
     */
    public function testDeleteChannel(): void
    {
        $channelID = 'test-del-' . $this->randomString(12);
        $type = 'messaging';

        $this->getOrCreateChannel($type, $channelID, new GeneratedModels\ChannelGetOrCreateRequest(
            data: new GeneratedModels\ChannelInput(createdByID: $this->creatorID),
        ));

        // Track for cleanup (hard delete) in case soft delete test fails
        $this->createdChannels[] = ['type' => $type, 'id' => $channelID];

        // Soft delete
        $resp = $this->deleteChannel($type, $channelID);
        $this->assertResponseSuccess($resp, 'soft delete channel');
        self::assertNotNull($resp->getData()->channel);
    }

    /**
     * @test
     */
    public function testHardDeleteChannels(): void
    {
        [$type1, $channelID1] = $this->createTestChannel($this->creatorID);
        [$type2, $channelID2] = $this->createTestChannel($this->creatorID);

        $cid1 = "messaging:{$channelID1}";
        $cid2 = "messaging:{$channelID2}";

        // Remove from cleanup tracking since we're hard-deleting them here
        $this->createdChannels = array_filter($this->createdChannels, function ($ch) use ($channelID1, $channelID2) {
            return $ch['id'] !== $channelID1 && $ch['id'] !== $channelID2;
        });

        $resp = $this->deleteChannelsBatch(new GeneratedModels\DeleteChannelsRequest(
            cids: [$cid1, $cid2],
            hardDelete: true,
        ));
        $this->assertResponseSuccess($resp, 'hard delete channels');
        self::assertNotEmpty($resp->getData()->taskID);

        $taskResult = $this->waitForTask($resp->getData()->taskID);
        self::assertEquals('completed', $taskResult->status);
    }

    /**
     * @test
     */
    public function testAddRemoveMembers(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );

        // Add members
        $resp = $this->updateChannel($type, $channelID, new GeneratedModels\UpdateChannelRequest(
            addMembers: [
                new GeneratedModels\ChannelMemberRequest(userID: $this->memberID2),
                new GeneratedModels\ChannelMemberRequest(userID: $this->memberID3),
            ],
        ));
        $this->assertResponseSuccess($resp, 'add members');

        // Verify members added
        $stateResp = $this->getOrCreateChannel($type, $channelID, new GeneratedModels\ChannelGetOrCreateRequest());
        $this->assertResponseSuccess($stateResp, 'get channel after add members');
        self::assertGreaterThanOrEqual(4, count($stateResp->getData()->members));

        // Remove a member
        $resp = $this->updateChannel($type, $channelID, new GeneratedModels\UpdateChannelRequest(
            removeMembers: [$this->memberID3],
        ));
        $this->assertResponseSuccess($resp, 'remove member');

        // Verify member removed
        $stateResp = $this->getOrCreateChannel($type, $channelID, new GeneratedModels\ChannelGetOrCreateRequest());
        $this->assertResponseSuccess($stateResp, 'get channel after remove member');
        $memberIDs = array_map(fn($m) => $m->userID, $stateResp->getData()->members ?? []);
        self::assertNotContains($this->memberID3, $memberIDs, 'memberID3 should have been removed');
    }

    /**
     * @test
     */
    public function testQueryMembers(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1, $this->memberID2],
        );

        $resp = $this->queryMembers(new GeneratedModels\QueryMembersPayload(
            type: 'messaging',
            id: $channelID,
            filterConditions: (object) [],
        ));
        $this->assertResponseSuccess($resp, 'query members');
        self::assertGreaterThanOrEqual(3, count($resp->getData()->members));
    }

    /**
     * @test
     */
    public function testInviteAcceptReject(): void
    {
        $channelID = 'test-inv-' . $this->randomString(12);
        $type = 'messaging';

        // Create channel with invites
        $resp = $this->getOrCreateChannel($type, $channelID, new GeneratedModels\ChannelGetOrCreateRequest(
            data: new GeneratedModels\ChannelInput(
                createdByID: $this->creatorID,
                members: [new GeneratedModels\ChannelMemberRequest(userID: $this->creatorID)],
                invites: [
                    new GeneratedModels\ChannelMemberRequest(userID: $this->memberID1),
                    new GeneratedModels\ChannelMemberRequest(userID: $this->memberID2),
                ],
            ),
        ));
        $this->assertResponseSuccess($resp, 'create channel with invites');
        $this->createdChannels[] = ['type' => $type, 'id' => $channelID];

        // Accept invite
        $resp = $this->updateChannel($type, $channelID, new GeneratedModels\UpdateChannelRequest(
            acceptInvite: true,
            userID: $this->memberID1,
        ));
        $this->assertResponseSuccess($resp, 'accept invite');

        // Reject invite
        $resp = $this->updateChannel($type, $channelID, new GeneratedModels\UpdateChannelRequest(
            rejectInvite: true,
            userID: $this->memberID2,
        ));
        $this->assertResponseSuccess($resp, 'reject invite');
    }

    /**
     * @test
     */
    public function testHideShowChannel(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );

        // Hide
        $resp = $this->hideChannel($type, $channelID, new GeneratedModels\HideChannelRequest(
            userID: $this->memberID1,
        ));
        $this->assertResponseSuccess($resp, 'hide channel');

        // Show
        $resp = $this->showChannel($type, $channelID, new GeneratedModels\ShowChannelRequest(
            userID: $this->memberID1,
        ));
        $this->assertResponseSuccess($resp, 'show channel');
    }

    /**
     * @test
     */
    public function testTruncateChannel(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );

        // Send some messages
        $this->sendTestMessage($type, $channelID, $this->creatorID, 'Message 1');
        $this->sendTestMessage($type, $channelID, $this->creatorID, 'Message 2');
        $this->sendTestMessage($type, $channelID, $this->creatorID, 'Message 3');

        // Truncate
        $resp = $this->truncateChannel($type, $channelID, new GeneratedModels\TruncateChannelRequest());
        $this->assertResponseSuccess($resp, 'truncate channel');

        // Verify messages are gone
        $stateResp = $this->getOrCreateChannel($type, $channelID, new GeneratedModels\ChannelGetOrCreateRequest());
        $this->assertResponseSuccess($stateResp, 'get channel after truncate');
        self::assertEmpty($stateResp->getData()->messages ?? [], 'Messages should be empty after truncation');
    }

    /**
     * @test
     */
    public function testFreezeUnfreezeChannel(): void
    {
        [$type, $channelID] = $this->createTestChannel($this->creatorID);

        // Freeze
        $resp = $this->updateChannelPartial($type, $channelID, new GeneratedModels\UpdateChannelPartialRequest(
            set: (object) ['frozen' => true],
        ));
        $this->assertResponseSuccess($resp, 'freeze channel');
        self::assertTrue($resp->getData()->channel->frozen);

        // Unfreeze
        $resp = $this->updateChannelPartial($type, $channelID, new GeneratedModels\UpdateChannelPartialRequest(
            set: (object) ['frozen' => false],
        ));
        $this->assertResponseSuccess($resp, 'unfreeze channel');
        self::assertFalse($resp->getData()->channel->frozen);
    }

    /**
     * @test
     */
    public function testMarkReadUnread(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );

        // Send a message
        $msgID = $this->sendTestMessage($type, $channelID, $this->creatorID, 'Message to mark read');

        // Mark read
        $resp = $this->markRead($type, $channelID, new GeneratedModels\MarkReadRequest(
            userID: $this->memberID1,
        ));
        $this->assertResponseSuccess($resp, 'mark read');

        // Mark unread from this message
        $resp = $this->markUnread($type, $channelID, new GeneratedModels\MarkUnreadRequest(
            userID: $this->memberID1,
            messageID: $msgID,
        ));
        $this->assertResponseSuccess($resp, 'mark unread');
    }

    /**
     * @test
     */
    public function testMuteUnmuteChannel(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );
        $cid = "messaging:{$channelID}";

        // Mute the channel for memberID1
        $muteResp = $this->muteChannel(new GeneratedModels\MuteChannelRequest(
            channelCids: [$cid],
            userID: $this->memberID1,
        ));
        $this->assertResponseSuccess($muteResp, 'mute channel');
        self::assertNotNull($muteResp->getData()->channelMute, 'Mute response should contain channelMute');
        self::assertNotNull($muteResp->getData()->channelMute->channel, 'ChannelMute should have channel');

        // Verify via QueryChannels with muted=true
        $qResp = $this->queryChannels(new GeneratedModels\QueryChannelsRequest(
            filterConditions: (object) ['muted' => true, 'cid' => $cid],
            userID: $this->memberID1,
        ));
        $this->assertResponseSuccess($qResp, 'query muted channels');
        self::assertCount(1, $qResp->getData()->channels, 'Should find exactly 1 muted channel');
        self::assertEquals($cid, $qResp->getData()->channels[0]->channel->cid);

        // Unmute
        $resp = $this->unmuteChannel(new GeneratedModels\UnmuteChannelRequest(
            channelCids: [$cid],
            userID: $this->memberID1,
        ));
        $this->assertResponseSuccess($resp, 'unmute channel');

        // Verify unmuted
        $qResp = $this->queryChannels(new GeneratedModels\QueryChannelsRequest(
            filterConditions: (object) ['muted' => false, 'cid' => $cid],
            userID: $this->memberID1,
        ));
        $this->assertResponseSuccess($qResp, 'query unmuted channels');
        self::assertCount(1, $qResp->getData()->channels, 'Unmuted channel should appear in muted=false query');
    }

    /**
     * @test
     */
    public function testMemberPartialUpdate(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );

        // Set custom fields on member
        $resp = $this->updateMemberPartial($type, $channelID, $this->memberID1, new GeneratedModels\UpdateMemberPartialRequest(
            set: (object) [
                'role_label' => 'moderator',
                'score' => 42,
            ],
        ));
        $this->assertResponseSuccess($resp, 'member partial update (set)');
        self::assertNotNull($resp->getData()->channelMember);
        self::assertEquals('moderator', $resp->getData()->channelMember->custom->role_label ?? null);

        // Unset a custom field
        $resp = $this->updateMemberPartial($type, $channelID, $this->memberID1, new GeneratedModels\UpdateMemberPartialRequest(
            unset: ['score'],
        ));
        $this->assertResponseSuccess($resp, 'member partial update (unset)');
        self::assertNotNull($resp->getData()->channelMember);
        $custom = $resp->getData()->channelMember->custom;
        self::assertTrue(
            $custom === null || !isset($custom->score),
            'score should be unset',
        );
    }

    /**
     * @test
     */
    public function testAssignRoles(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );

        // Assign channel_moderator role to memberID1
        $resp = $this->updateChannel($type, $channelID, new GeneratedModels\UpdateChannelRequest(
            assignRoles: [
                new GeneratedModels\ChannelMemberRequest(
                    userID: $this->memberID1,
                    channelRole: 'channel_moderator',
                ),
            ],
        ));
        $this->assertResponseSuccess($resp, 'assign roles');

        // Verify via QueryMembers
        $qResp = $this->queryMembers(new GeneratedModels\QueryMembersPayload(
            type: 'messaging',
            id: $channelID,
            filterConditions: (object) ['id' => $this->memberID1],
        ));
        $this->assertResponseSuccess($qResp, 'query members after assign roles');
        self::assertNotEmpty($qResp->getData()->members);
        self::assertEquals('channel_moderator', $qResp->getData()->members[0]->channelRole);
    }

    /**
     * @test
     */
    public function testAddDemoteModerators(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );

        // Add moderator
        $resp = $this->updateChannel($type, $channelID, new GeneratedModels\UpdateChannelRequest(
            addModerators: [$this->memberID1],
        ));
        $this->assertResponseSuccess($resp, 'add moderator');

        // Verify role changed to moderator
        $qResp = $this->queryMembers(new GeneratedModels\QueryMembersPayload(
            type: 'messaging',
            id: $channelID,
            filterConditions: (object) ['id' => $this->memberID1],
        ));
        $this->assertResponseSuccess($qResp, 'query members after add moderator');
        self::assertNotEmpty($qResp->getData()->members);
        self::assertEquals('channel_moderator', $qResp->getData()->members[0]->channelRole);

        // Demote moderator back to member
        $resp = $this->updateChannel($type, $channelID, new GeneratedModels\UpdateChannelRequest(
            demoteModerators: [$this->memberID1],
        ));
        $this->assertResponseSuccess($resp, 'demote moderator');

        // Verify role changed back to member
        $qResp = $this->queryMembers(new GeneratedModels\QueryMembersPayload(
            type: 'messaging',
            id: $channelID,
            filterConditions: (object) ['id' => $this->memberID1],
        ));
        $this->assertResponseSuccess($qResp, 'query members after demote moderator');
        self::assertNotEmpty($qResp->getData()->members);
        self::assertEquals('channel_member', $qResp->getData()->members[0]->channelRole);
    }

    /**
     * @test
     */
    public function testMarkUnreadWithThread(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );

        // Send parent message
        $parentID = $this->sendTestMessage($type, $channelID, $this->creatorID, 'Parent for mark unread thread');

        // Send reply to create a thread
        $resp = $this->sendMessage($type, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'Reply in thread',
                userID: $this->creatorID,
                parentID: $parentID,
            ),
        ));
        $this->assertResponseSuccess($resp, 'send thread reply');

        // Mark unread from thread
        $resp = $this->markUnread($type, $channelID, new GeneratedModels\MarkUnreadRequest(
            userID: $this->memberID1,
            threadID: $parentID,
        ));
        $this->assertResponseSuccess($resp, 'mark unread with thread');
    }

    /**
     * @test
     */
    public function testTruncateWithOptions(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );

        // Send messages
        $this->sendTestMessage($type, $channelID, $this->creatorID, 'Truncate msg 1');
        $this->sendTestMessage($type, $channelID, $this->creatorID, 'Truncate msg 2');

        // Truncate with message, skip push, and hard delete
        $resp = $this->truncateChannel($type, $channelID, new GeneratedModels\TruncateChannelRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'Channel was truncated',
                userID: $this->creatorID,
            ),
            skipPush: true,
            hardDelete: true,
        ));
        $this->assertResponseSuccess($resp, 'truncate with options');
    }

    /**
     * @test
     */
    public function testPinUnpinChannel(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );

        // Pin channel for memberID1 via UpdateMemberPartial
        $resp = $this->updateMemberPartial($type, $channelID, $this->memberID1, new GeneratedModels\UpdateMemberPartialRequest(
            set: (object) ['pinned' => true],
        ));
        $this->assertResponseSuccess($resp, 'pin channel');

        // Verify via QueryChannels with pinned filter
        $qResp = $this->queryChannels(new GeneratedModels\QueryChannelsRequest(
            filterConditions: (object) [
                'pinned' => true,
                'cid' => "messaging:{$channelID}",
            ],
            userID: $this->memberID1,
        ));
        $this->assertResponseSuccess($qResp, 'query pinned channels');
        self::assertCount(1, $qResp->getData()->channels, 'Should find 1 pinned channel');
        self::assertEquals("messaging:{$channelID}", $qResp->getData()->channels[0]->channel->cid);

        // Unpin
        $resp = $this->updateMemberPartial($type, $channelID, $this->memberID1, new GeneratedModels\UpdateMemberPartialRequest(
            set: (object) ['pinned' => false],
        ));
        $this->assertResponseSuccess($resp, 'unpin channel');

        // Verify unpinned
        $qResp = $this->queryChannels(new GeneratedModels\QueryChannelsRequest(
            filterConditions: (object) [
                'pinned' => false,
                'cid' => "messaging:{$channelID}",
            ],
            userID: $this->memberID1,
        ));
        $this->assertResponseSuccess($qResp, 'query unpinned channels');
        self::assertCount(1, $qResp->getData()->channels, 'Should find channel with pinned=false');
    }

    /**
     * @test
     */
    public function testArchiveUnarchiveChannel(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );

        // Archive channel for memberID1 via UpdateMemberPartial
        $resp = $this->updateMemberPartial($type, $channelID, $this->memberID1, new GeneratedModels\UpdateMemberPartialRequest(
            set: (object) ['archived' => true],
        ));
        $this->assertResponseSuccess($resp, 'archive channel');

        // Verify via QueryChannels with archived filter
        $qResp = $this->queryChannels(new GeneratedModels\QueryChannelsRequest(
            filterConditions: (object) [
                'archived' => true,
                'cid' => "messaging:{$channelID}",
            ],
            userID: $this->memberID1,
        ));
        $this->assertResponseSuccess($qResp, 'query archived channels');
        self::assertCount(1, $qResp->getData()->channels, 'Should find 1 archived channel');

        // Unarchive
        $resp = $this->updateMemberPartial($type, $channelID, $this->memberID1, new GeneratedModels\UpdateMemberPartialRequest(
            set: (object) ['archived' => false],
        ));
        $this->assertResponseSuccess($resp, 'unarchive channel');

        // Verify unarchived
        $qResp = $this->queryChannels(new GeneratedModels\QueryChannelsRequest(
            filterConditions: (object) [
                'archived' => false,
                'cid' => "messaging:{$channelID}",
            ],
            userID: $this->memberID1,
        ));
        $this->assertResponseSuccess($qResp, 'query unarchived channels');
        self::assertCount(1, $qResp->getData()->channels, 'Should find channel with archived=false');
    }

    /**
     * @test
     */
    public function testAddMembersWithRoles(): void
    {
        [$type, $channelID] = $this->createTestChannel($this->creatorID);

        $newUserIDs = $this->createTestUsers(2);
        $modUserID = $newUserIDs[0];
        $memberUserID = $newUserIDs[1];

        // Add members with specific channel roles
        $resp = $this->updateChannel($type, $channelID, new GeneratedModels\UpdateChannelRequest(
            addMembers: [
                new GeneratedModels\ChannelMemberRequest(userID: $modUserID, channelRole: 'channel_moderator'),
                new GeneratedModels\ChannelMemberRequest(userID: $memberUserID, channelRole: 'channel_member'),
            ],
        ));
        $this->assertResponseSuccess($resp, 'add members with roles');

        // Query members to verify roles
        $membersResp = $this->queryMembers(new GeneratedModels\QueryMembersPayload(
            type: 'messaging',
            id: $channelID,
            filterConditions: (object) ['id' => (object) ['$in' => $newUserIDs]],
        ));
        $this->assertResponseSuccess($membersResp, 'query members with roles');

        $roleMap = [];
        foreach ($membersResp->getData()->members ?? [] as $m) {
            if ($m->userID !== null) {
                $roleMap[$m->userID] = $m->channelRole;
            }
        }
        self::assertEquals('channel_moderator', $roleMap[$modUserID] ?? null, 'First user should be channel_moderator');
        self::assertEquals('channel_member', $roleMap[$memberUserID] ?? null, 'Second user should be channel_member');
    }

    /**
     * @test
     */
    public function testMessageCount(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );

        // Send a message
        $this->sendTestMessage($type, $channelID, $this->creatorID, 'hello world');

        // Query the channel to get message count
        $qResp = $this->queryChannels(new GeneratedModels\QueryChannelsRequest(
            filterConditions: (object) ['cid' => "messaging:{$channelID}"],
            userID: $this->creatorID,
        ));
        $this->assertResponseSuccess($qResp, 'query channel for message count');
        self::assertCount(1, $qResp->getData()->channels);

        $channel = $qResp->getData()->channels[0]->channel;
        if ($channel->messageCount !== null) {
            self::assertGreaterThanOrEqual(1, $channel->messageCount, 'MessageCount should be >= 1');
        }
    }

    /**
     * @test
     */
    public function testSendChannelEvent(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );

        $resp = $this->sendEvent($type, $channelID, new GeneratedModels\SendEventRequest(
            event: new GeneratedModels\EventRequest(
                type: 'typing.start',
                userID: $this->creatorID,
            ),
        ));
        $this->assertResponseSuccess($resp, 'send channel event');
    }

    /**
     * @test
     */
    public function testFilterTags(): void
    {
        [$type, $channelID] = $this->createTestChannel($this->creatorID);

        // Add filter tags
        $resp = $this->updateChannel($type, $channelID, new GeneratedModels\UpdateChannelRequest(
            addFilterTags: ['sports', 'news'],
        ));
        $this->assertResponseSuccess($resp, 'add filter tags');

        // Verify tags were added
        $stateResp = $this->getOrCreateChannel($type, $channelID, new GeneratedModels\ChannelGetOrCreateRequest());
        $this->assertResponseSuccess($stateResp, 'get channel after adding filter tags');

        // Remove filter tag
        $resp = $this->updateChannel($type, $channelID, new GeneratedModels\UpdateChannelRequest(
            removeFilterTags: ['sports'],
        ));
        $this->assertResponseSuccess($resp, 'remove filter tag');
    }

    /**
     * @test
     */
    public function testMessageCountDisabled(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );

        // Disable count_messages via config_overrides partial update
        $resp = $this->updateChannelPartial($type, $channelID, new GeneratedModels\UpdateChannelPartialRequest(
            set: (object) [
                'config_overrides' => (object) [
                    'count_messages' => false,
                ],
            ],
        ));
        $this->assertResponseSuccess($resp, 'disable message count');

        // Send a message
        $this->sendTestMessage($type, $channelID, $this->creatorID, 'hello world disabled count');

        // Query the channel — MessageCount should be nil when disabled
        $qResp = $this->queryChannels(new GeneratedModels\QueryChannelsRequest(
            filterConditions: (object) ['cid' => "messaging:{$channelID}"],
            userID: $this->creatorID,
        ));
        $this->assertResponseSuccess($qResp, 'query channel with disabled message count');
        self::assertCount(1, $qResp->getData()->channels);
        self::assertNull(
            $qResp->getData()->channels[0]->channel->messageCount,
            'MessageCount should be null when count_messages is disabled',
        );
    }

    /**
     * @test
     */
    public function testMarkUnreadWithTimestamp(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID, $this->memberID1],
        );

        // Send a message to get a valid timestamp
        $sendResp = $this->sendMessage($type, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'test message for timestamp unread',
                userID: $this->creatorID,
            ),
        ));
        $this->assertResponseSuccess($sendResp, 'send message for timestamp');
        self::assertNotNull($sendResp->getData()->message->createdAt);

        $ts = $sendResp->getData()->message->createdAt;

        // Mark unread from timestamp
        $resp = $this->markUnread($type, $channelID, new GeneratedModels\MarkUnreadRequest(
            userID: $this->memberID1,
            messageTimestamp: $ts,
        ));
        $this->assertResponseSuccess($resp, 'mark unread with timestamp');
    }

    /**
     * @test
     */
    public function testHideForCreator(): void
    {
        $channelID = 'test-hide-' . $this->randomString(12);
        $type = 'messaging';

        $resp = $this->getOrCreateChannel($type, $channelID, new GeneratedModels\ChannelGetOrCreateRequest(
            hideForCreator: true,
            data: new GeneratedModels\ChannelInput(
                createdByID: $this->creatorID,
                members: [
                    new GeneratedModels\ChannelMemberRequest(userID: $this->creatorID),
                    new GeneratedModels\ChannelMemberRequest(userID: $this->memberID1),
                ],
            ),
        ));
        $this->assertResponseSuccess($resp, 'create channel with hide for creator');
        $this->createdChannels[] = ['type' => $type, 'id' => $channelID];

        // Channel should be hidden for creator — querying should not find it
        $qResp = $this->queryChannels(new GeneratedModels\QueryChannelsRequest(
            filterConditions: (object) ['cid' => "messaging:{$channelID}"],
            userID: $this->creatorID,
        ));
        $this->assertResponseSuccess($qResp, 'query hidden channel');
        self::assertEmpty($qResp->getData()->channels, 'Channel should be hidden for creator');
    }

    /**
     * @test
     */
    public function testUploadAndDeleteFile(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID],
        );

        // Create a temp file
        $tmpFile = tempnam(sys_get_temp_dir(), 'chat-test-') . '.txt';
        file_put_contents($tmpFile, 'hello world test file content');

        try {
            // Upload file using the makeRequest multipart pattern
            $uploadResp = StreamResponse::fromJson(
                $this->client->makeRequest(
                    'POST',
                    "/api/v2/chat/channels/{$type}/{$channelID}/file",
                    [],
                    new GeneratedModels\FileUploadRequest(
                        file: $tmpFile,
                        user: new GeneratedModels\OnlyUserID(id: $this->creatorID),
                    ),
                ),
                GeneratedModels\UploadChannelFileResponse::class,
            );
            $this->assertResponseSuccess($uploadResp, 'upload file');
            self::assertNotEmpty($uploadResp->getData()->file);
            $fileURL = $uploadResp->getData()->file;
            self::assertStringContainsString('http', $fileURL);

            // Delete file
            $deleteResp = StreamResponse::fromJson(
                $this->client->makeRequest(
                    'DELETE',
                    "/api/v2/chat/channels/{$type}/{$channelID}/file",
                    ['url' => $fileURL],
                ),
                GeneratedModels\Response::class,
            );
            $this->assertResponseSuccess($deleteResp, 'delete file');
        } finally {
            @unlink($tmpFile);
        }
    }

    /**
     * @test
     */
    public function testUploadAndDeleteImage(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers(
            $this->creatorID,
            [$this->creatorID],
        );

        // Create a minimal valid PNG file (1x1 pixel)
        $tmpFile = tempnam(sys_get_temp_dir(), 'chat-test-') . '.png';
        // Minimal valid PNG: 1x1 white pixel
        $pngData = base64_decode(
            'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg=='
        );
        file_put_contents($tmpFile, $pngData);

        try {
            // Upload image
            $uploadResp = StreamResponse::fromJson(
                $this->client->makeRequest(
                    'POST',
                    "/api/v2/chat/channels/{$type}/{$channelID}/image",
                    [],
                    new GeneratedModels\ImageUploadRequest(
                        file: $tmpFile,
                        user: new GeneratedModels\OnlyUserID(id: $this->creatorID),
                    ),
                ),
                GeneratedModels\UploadChannelFileResponse::class,
            );
            $this->assertResponseSuccess($uploadResp, 'upload image');
            self::assertNotEmpty($uploadResp->getData()->file);
            $imageURL = $uploadResp->getData()->file;
            self::assertStringContainsString('http', $imageURL);

            // Delete image
            $deleteResp = StreamResponse::fromJson(
                $this->client->makeRequest(
                    'DELETE',
                    "/api/v2/chat/channels/{$type}/{$channelID}/image",
                    ['url' => $imageURL],
                ),
                GeneratedModels\Response::class,
            );
            $this->assertResponseSuccess($deleteResp, 'delete image');
        } finally {
            @unlink($tmpFile);
        }
    }
}
