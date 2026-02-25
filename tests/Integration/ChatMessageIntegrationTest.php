<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\GeneratedModels;
use PHPUnit\Framework\Attributes\Group;

/**
 * Integration tests for Chat Message operations.
 * Follows the pattern from getstream-go's chat_message_integration_test.go.
 */
#[Group('integration')]
class ChatMessageIntegrationTest extends ChatTestCase
{
    private string $userID;
    private string $userID2;

    protected static function sharedUserCount(): int
    {
        return 2;
    }

    protected function setUp(): void
    {
        parent::setUp();
        $shared = $this->getSharedUserIDs();
        $this->userID = $shared[0];
        $this->userID2 = $shared[1];
    }

    // =========================================================================
    // Send / Get / Update / Delete
    // =========================================================================

    public function testSendAndGetMessage(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);

        $msgText = 'Hello from integration test ' . $this->randomString(8);
        $msgID = $this->sendTestMessage($type, $channelID, $this->userID, $msgText);

        // Get message by ID
        $resp = $this->getMessage($msgID);
        $this->assertResponseSuccess($resp, 'get message');

        $data = $resp->getData();
        self::assertNotNull($data->message);
        self::assertEquals($msgID, $data->message->id);
        self::assertEquals($msgText, $data->message->text);
    }

    public function testGetManyMessages(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);

        $id1 = $this->sendTestMessage($type, $channelID, $this->userID, 'Msg 1');
        $id2 = $this->sendTestMessage($type, $channelID, $this->userID, 'Msg 2');
        $id3 = $this->sendTestMessage($type, $channelID, $this->userID, 'Msg 3');

        $resp = $this->getManyMessages($type, $channelID, [$id1, $id2, $id3]);
        $this->assertResponseSuccess($resp, 'get many messages');

        $data = $resp->getData();
        self::assertCount(3, $data->messages);
    }

    public function testUpdateMessage(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);
        $msgID = $this->sendTestMessage($type, $channelID, $this->userID, 'Original text');

        $updatedText = 'Updated text ' . $this->randomString(8);
        $resp = $this->updateMessage($msgID, new GeneratedModels\UpdateMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: $updatedText,
                userID: $this->userID,
            ),
        ));
        $this->assertResponseSuccess($resp, 'update message');
        self::assertEquals($updatedText, $resp->getData()->message->text);
    }

    public function testPartialUpdateMessage(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);
        $msgID = $this->sendTestMessage($type, $channelID, $this->userID, 'Partial update test');

        // Set custom fields
        $resp = $this->updateMessagePartial($msgID, new GeneratedModels\UpdateMessagePartialRequest(
            set: (object) [
                'priority' => 'high',
                'status' => 'reviewed',
            ],
            userID: $this->userID,
        ));
        $this->assertResponseSuccess($resp, 'partial update message (set)');
        self::assertNotNull($resp->getData()->message);

        // Unset custom field
        $resp = $this->updateMessagePartial($msgID, new GeneratedModels\UpdateMessagePartialRequest(
            unset: ['status'],
            userID: $this->userID,
        ));
        $this->assertResponseSuccess($resp, 'partial update message (unset)');
        self::assertNotNull($resp->getData()->message);
    }

    public function testDeleteMessage(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);
        $msgID = $this->sendTestMessage($type, $channelID, $this->userID, 'Message to delete');

        // Soft delete
        $resp = $this->deleteMessageApi($msgID);
        $this->assertResponseSuccess($resp, 'delete message');
        self::assertEquals('deleted', $resp->getData()->message->type);
    }

    public function testHardDeleteMessage(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);
        $msgID = $this->sendTestMessage($type, $channelID, $this->userID, 'Message to hard delete');

        $resp = $this->deleteMessageApi($msgID, hard: true);
        $this->assertResponseSuccess($resp, 'hard delete message');
        self::assertEquals('deleted', $resp->getData()->message->type);
    }

    // =========================================================================
    // Pin / Unpin
    // =========================================================================

    public function testPinUnpinMessage(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);

        // Send a pinned message
        $sendResp = $this->sendMessage($type, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'Pinned message',
                userID: $this->userID,
                pinned: true,
            ),
        ));
        $this->assertResponseSuccess($sendResp, 'send pinned message');
        $msgID = $sendResp->getData()->message->id;
        self::assertTrue($sendResp->getData()->message->pinned);

        // Unpin via partial update
        $resp = $this->updateMessagePartial($msgID, new GeneratedModels\UpdateMessagePartialRequest(
            set: (object) ['pinned' => false],
            userID: $this->userID,
        ));
        $this->assertResponseSuccess($resp, 'unpin message');
        self::assertFalse($resp->getData()->message->pinned);
    }

    public function testPinExpiration(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID, $this->userID2]);

        // Send message by user2
        $msgID = $this->sendTestMessage($type, $channelID, $this->userID2, 'Message to pin with expiry');

        // Pin with 3 second expiration
        $expiry = (new \DateTime())->modify('+3 seconds');
        $resp = $this->updateMessagePartial($msgID, new GeneratedModels\UpdateMessagePartialRequest(
            set: (object) [
                'pinned' => true,
                'pin_expires' => $expiry->format(\DateTime::RFC3339),
            ],
            userID: $this->userID,
        ));
        $this->assertResponseSuccess($resp, 'pin message with expiry');
        self::assertTrue($resp->getData()->message->pinned);

        // Wait for pin to expire
        sleep(4);

        // Verify pin expired
        $getResp = $this->getMessage($msgID);
        $this->assertResponseSuccess($getResp, 'get message after pin expiry');
        self::assertFalse($getResp->getData()->message->pinned, 'Pin should have expired');
    }

    // =========================================================================
    // Translate
    // =========================================================================

    public function testTranslateMessage(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);
        $msgID = $this->sendTestMessage($type, $channelID, $this->userID, 'Hello, how are you?');

        $resp = $this->translateMessage($msgID, new GeneratedModels\TranslateMessageRequest(
            language: 'es',
        ));
        $this->assertResponseSuccess($resp, 'translate message');
        self::assertNotNull($resp->getData()->message);
        self::assertNotNull($resp->getData()->message->i18n, 'i18n field should be set after translation');
    }

    // =========================================================================
    // Threads
    // =========================================================================

    public function testThreadReply(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID, $this->userID2]);

        // Send parent message
        $parentID = $this->sendTestMessage($type, $channelID, $this->userID, 'Parent message for thread');

        // Send reply
        $replyResp = $this->sendMessage($type, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'Reply to parent',
                userID: $this->userID2,
                parentID: $parentID,
            ),
        ));
        $this->assertResponseSuccess($replyResp, 'send thread reply');
        self::assertNotEmpty($replyResp->getData()->message->id);

        // Get replies
        $repliesResp = $this->getReplies($parentID);
        $this->assertResponseSuccess($repliesResp, 'get replies');
        self::assertGreaterThanOrEqual(1, count($repliesResp->getData()->messages));
    }

    // =========================================================================
    // Search
    // =========================================================================

    public function testSearchMessages(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);

        $searchTerm = 'uniquesearch' . $this->randomString(8);
        $this->sendTestMessage($type, $channelID, $this->userID, "This message contains {$searchTerm} for testing");

        // Wait for indexing
        sleep(2);

        $resp = $this->searchMessages(new GeneratedModels\SearchPayload(
            query: $searchTerm,
            filterConditions: (object) ['cid' => "messaging:{$channelID}"],
        ));
        $this->assertResponseSuccess($resp, 'search messages');
        self::assertNotEmpty($resp->getData()->results, 'Search should return at least one result');
    }

    public function testSearchWithMessageFilters(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);

        $searchTerm = 'filterable' . $this->randomString(8);
        $this->sendTestMessage($type, $channelID, $this->userID, "This has {$searchTerm} text");
        $this->sendTestMessage($type, $channelID, $this->userID, "This also has {$searchTerm} text");

        // Wait for indexing
        sleep(2);

        // Search using message_filter_conditions instead of query
        $resp = $this->searchMessages(new GeneratedModels\SearchPayload(
            filterConditions: (object) ['cid' => "messaging:{$channelID}"],
            messageFilterConditions: (object) ['text' => (object) ['$q' => $searchTerm]],
        ));
        $this->assertResponseSuccess($resp, 'search with message filters');
        self::assertGreaterThanOrEqual(2, count($resp->getData()->results), 'Should find at least 2 messages with MessageFilterConditions');
    }

    public function testSearchQueryAndMessageFiltersError(): void
    {
        // Using both query and messageFilterConditions together should error
        $this->expectException(\Exception::class);
        $this->searchMessages(new GeneratedModels\SearchPayload(
            query: 'test',
            filterConditions: (object) ['members' => (object) ['$in' => [$this->userID]]],
            messageFilterConditions: (object) ['text' => (object) ['$q' => 'test']],
        ));
    }


    public function testSearchOffsetAndNextError(): void
    {
        // Using offset with next should error
        $this->expectException(\Exception::class);
        $this->searchMessages(new GeneratedModels\SearchPayload(
            query: 'test',
            filterConditions: (object) ['members' => (object) ['$in' => [$this->userID]]],
            offset: 1,
            next: $this->randomString(5),
        ));
    }

    // =========================================================================
    // Special Message Types
    // =========================================================================

    public function testSilentMessage(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);

        $resp = $this->sendMessage($type, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'This is a silent message',
                userID: $this->userID,
                silent: true,
            ),
        ));
        $this->assertResponseSuccess($resp, 'send silent message');
        self::assertTrue($resp->getData()->message->silent);
    }

    public function testSystemMessage(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);

        $resp = $this->sendMessage($type, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'User joined the channel',
                userID: $this->userID,
                type: 'system',
            ),
        ));
        $this->assertResponseSuccess($resp, 'send system message');
        self::assertEquals('system', $resp->getData()->message->type);
    }

    // =========================================================================
    // Pending Messages
    // =========================================================================

    public function testPendingMessage(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);

        // Send a pending message (requires feature flag)
        try {
            $sendResp = $this->sendMessage($type, $channelID, new GeneratedModels\SendMessageRequest(
                message: new GeneratedModels\MessageRequest(
                    text: 'Pending message text',
                    userID: $this->userID,
                ),
                pending: true,
                skipPush: true,
            ));
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'pending messages not enabled') || str_contains($e->getMessage(), 'feature flag')) {
                $this->markTestSkipped('Pending messages feature not enabled for this app');
            }
            throw $e;
        }
        $this->assertResponseSuccess($sendResp, 'send pending message');
        $msgID = $sendResp->getData()->message->id;
        self::assertNotEmpty($msgID);

        // Commit the pending message
        $commitResp = $this->commitMessage($msgID);
        $this->assertResponseSuccess($commitResp, 'commit pending message');
        self::assertNotNull($commitResp->getData()->message);
        self::assertEquals($msgID, $commitResp->getData()->message->id);
    }

    public function testPendingFalse(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);

        // Send message with pending explicitly set to false
        $sendResp = $this->sendMessage($type, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'Non-pending message',
                userID: $this->userID,
            ),
            pending: false,
        ));
        $this->assertResponseSuccess($sendResp, 'send non-pending message');

        // Get the message to verify it's immediately available
        $getResp = $this->getMessage($sendResp->getData()->message->id);
        $this->assertResponseSuccess($getResp, 'get non-pending message');
        self::assertEquals('Non-pending message', $getResp->getData()->message->text);
    }

    // =========================================================================
    // Message History
    // =========================================================================

    public function testQueryMessageHistory(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID, $this->userID2]);

        // Send initial message with custom data
        $sendResp = $this->sendMessage($type, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'initial text',
                userID: $this->userID,
                custom: (object) ['custom_field' => 'custom value'],
            ),
        ));
        $this->assertResponseSuccess($sendResp, 'send initial message');
        $msgID = $sendResp->getData()->message->id;

        // Update by user1
        $this->updateMessage($msgID, new GeneratedModels\UpdateMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'updated text',
                userID: $this->userID,
                custom: (object) ['custom_field' => 'updated custom value'],
            ),
        ));

        // Update by user2
        $this->updateMessage($msgID, new GeneratedModels\UpdateMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'updated text 2',
                userID: $this->userID2,
            ),
        ));

        // Query message history
        try {
            $histResp = $this->queryMessageHistory(new GeneratedModels\QueryMessageHistoryRequest(
                filter: (object) ['message_id' => $msgID],
                sort: [],
            ));
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'feature flag') || str_contains($e->getMessage(), 'not enabled')) {
                $this->markTestSkipped('QueryMessageHistory feature not enabled for this app');
            }
            throw $e;
        }
        $this->assertResponseSuccess($histResp, 'query message history');
        self::assertGreaterThanOrEqual(2, count($histResp->getData()->messageHistory), 'Should have at least 2 history entries');

        // Verify history entries reference the correct message
        foreach ($histResp->getData()->messageHistory as $entry) {
            self::assertEquals($msgID, $entry->messageID);
        }

        // Verify text values in history (descending order by default)
        self::assertEquals('updated text', $histResp->getData()->messageHistory[0]->text);
        self::assertEquals($this->userID, $histResp->getData()->messageHistory[0]->messageUpdatedByID);
        self::assertEquals('initial text', $histResp->getData()->messageHistory[1]->text);
        self::assertEquals($this->userID, $histResp->getData()->messageHistory[1]->messageUpdatedByID);
    }

    public function testQueryMessageHistorySort(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID, $this->userID2]);

        $sendResp = $this->sendMessage($type, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'sort initial',
                userID: $this->userID,
            ),
        ));
        $this->assertResponseSuccess($sendResp, 'send initial message for sort test');
        $msgID = $sendResp->getData()->message->id;

        $this->updateMessage($msgID, new GeneratedModels\UpdateMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'sort updated 1',
                userID: $this->userID,
            ),
        ));

        $this->updateMessage($msgID, new GeneratedModels\UpdateMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'sort updated 2',
                userID: $this->userID,
            ),
        ));

        // Query with ascending sort by message_updated_at
        try {
            $histResp = $this->queryMessageHistory(new GeneratedModels\QueryMessageHistoryRequest(
                filter: (object) ['message_id' => $msgID],
                sort: [new GeneratedModels\SortParamRequest(field: 'message_updated_at', direction: 1)],
            ));
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'feature flag') || str_contains($e->getMessage(), 'not enabled')) {
                $this->markTestSkipped('QueryMessageHistory feature not enabled for this app');
            }
            throw $e;
        }
        $this->assertResponseSuccess($histResp, 'query message history with sort');
        self::assertGreaterThanOrEqual(2, count($histResp->getData()->messageHistory));

        // Ascending: oldest first
        self::assertEquals('sort initial', $histResp->getData()->messageHistory[0]->text);
        self::assertEquals($this->userID, $histResp->getData()->messageHistory[0]->messageUpdatedByID);
    }

    // =========================================================================
    // URL Enrichment
    // =========================================================================

    public function testSkipEnrichUrl(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);

        // Send a message with a URL but skip enrichment
        $sendResp = $this->sendMessage($type, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'Check out https://getstream.io for more info',
                userID: $this->userID,
            ),
            skipEnrichUrl: true,
        ));
        $this->assertResponseSuccess($sendResp, 'send message with skip enrich url');
        self::assertEmpty($sendResp->getData()->message->attachments, 'Attachments should be empty when skipEnrichUrl is true');

        // Verify via GetMessage that attachments remain empty
        sleep(3);
        $getResp = $this->getMessage($sendResp->getData()->message->id);
        $this->assertResponseSuccess($getResp, 'get message after enrichment window');
        self::assertEmpty($getResp->getData()->message->attachments, 'Attachments should remain empty after enrichment window');
    }

    // =========================================================================
    // Channel Hidden / Visibility
    // =========================================================================

    public function testKeepChannelHidden(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);

        // Hide the channel first
        $hideResp = $this->hideChannel($type, $channelID, new GeneratedModels\HideChannelRequest(
            userID: $this->userID,
        ));
        $this->assertResponseSuccess($hideResp, 'hide channel');

        // Send a message with keepChannelHidden=true
        $sendResp = $this->sendMessage($type, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'Hidden message',
                userID: $this->userID,
            ),
            keepChannelHidden: true,
        ));
        $this->assertResponseSuccess($sendResp, 'send with keep channel hidden');

        // Query channels — the channel should still be hidden
        $qResp = $this->queryChannels(new GeneratedModels\QueryChannelsRequest(
            filterConditions: (object) ['cid' => "messaging:{$channelID}"],
            userID: $this->userID,
        ));
        $this->assertResponseSuccess($qResp, 'query channels for hidden check');
        self::assertEmpty($qResp->getData()->channels, 'Channel should remain hidden after sending with keepChannelHidden');
    }

    // =========================================================================
    // Delete / Undelete Variants
    // =========================================================================

    public function testUndeleteMessage(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);
        $msgID = $this->sendTestMessage($type, $channelID, $this->userID, 'Message to undelete');

        // Soft delete the message
        $delResp = $this->deleteMessageApi($msgID);
        $this->assertResponseSuccess($delResp, 'soft delete message');

        // Verify it's deleted
        $getResp = $this->getMessage($msgID);
        $this->assertResponseSuccess($getResp, 'get deleted message');
        self::assertEquals('deleted', $getResp->getData()->message->type);

        // Undelete the message
        try {
            $undelResp = $this->undeleteMessage($msgID, new GeneratedModels\UndeleteMessageRequest(
                undeletedBy: $this->userID,
            ));
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'undeleted_by') || str_contains($e->getMessage(), 'required field')) {
                $this->markTestSkipped('UndeleteMessage requires field not yet in generated request struct');
            }
            throw $e;
        }
        $this->assertResponseSuccess($undelResp, 'undelete message');
        self::assertNotNull($undelResp->getData()->message);
        self::assertNotEquals('deleted', $undelResp->getData()->message->type);
        self::assertEquals('Message to undelete', $undelResp->getData()->message->text);
    }

    public function testRestrictedVisibility(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID, $this->userID2]);

        // Send a message with restricted visibility — only userID can see it
        try {
            $sendResp = $this->sendMessage($type, $channelID, new GeneratedModels\SendMessageRequest(
                message: new GeneratedModels\MessageRequest(
                    text: 'Secret message',
                    userID: $this->userID,
                    restrictedVisibility: [$this->userID],
                ),
            ));
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'private messaging is not allowed') || str_contains($e->getMessage(), 'not enabled')) {
                $this->markTestSkipped('RestrictedVisibility (private messaging) is not enabled for this app');
            }
            throw $e;
        }
        $this->assertResponseSuccess($sendResp, 'send restricted visibility message');
        self::assertEquals([$this->userID], $sendResp->getData()->message->restrictedVisibility);
    }

    public function testDeleteMessageForMe(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);
        $msgID = $this->sendTestMessage($type, $channelID, $this->userID, 'test message to delete for me');

        // Delete the message only for the sender
        $resp = $this->deleteMessageApi($msgID, deleteForMe: true, deletedBy: $this->userID);
        $this->assertResponseSuccess($resp, 'delete message for me');
    }

    // =========================================================================
    // Channel Role in Member
    // =========================================================================

    public function testChannelRoleInMember(): void
    {
        $roleUserIDs = $this->createTestUsers(2);
        $memberUserID = $roleUserIDs[0];
        $customRoleUserID = $roleUserIDs[1];

        $channelID = 'test-ch-' . $this->randomString(12);
        $channelType = 'messaging';

        $createResp = $this->getOrCreateChannel($channelType, $channelID, new GeneratedModels\ChannelGetOrCreateRequest(
            data: new GeneratedModels\ChannelInput(
                createdByID: $memberUserID,
                members: [
                    new GeneratedModels\ChannelMemberRequest(userID: $memberUserID, channelRole: 'channel_member'),
                    new GeneratedModels\ChannelMemberRequest(userID: $customRoleUserID, channelRole: 'channel_moderator'),
                ],
            ),
        ));
        $this->assertResponseSuccess($createResp, 'create channel with roles');
        $this->createdChannels[] = ['type' => $channelType, 'id' => $channelID];

        // Send message from channel_member
        $respMember = $this->sendMessage($channelType, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'message from channel_member',
                userID: $memberUserID,
            ),
        ));
        $this->assertResponseSuccess($respMember, 'send from channel_member');
        self::assertNotNull($respMember->getData()->message->member, 'Member should be present in message response');
        self::assertEquals('channel_member', $respMember->getData()->message->member->channelRole);

        // Send message from channel_moderator
        $respMod = $this->sendMessage($channelType, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: 'message from channel_moderator',
                userID: $customRoleUserID,
            ),
        ));
        $this->assertResponseSuccess($respMod, 'send from channel_moderator');
        self::assertNotNull($respMod->getData()->message->member, 'Member should be present in message response');
        self::assertEquals('channel_moderator', $respMod->getData()->message->member->channelRole);
    }
}
