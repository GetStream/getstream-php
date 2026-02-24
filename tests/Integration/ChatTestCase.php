<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\Client;
use GetStream\ClientBuilder;
use GetStream\Exceptions\StreamApiException;
use GetStream\GeneratedModels;
use GetStream\StreamResponse;
use PHPUnit\Framework\TestCase;

/**
 * Base test case for Chat integration tests.
 *
 * Provides helper methods for creating/cleaning up test users, channels, and messages.
 * Follows the patterns established in getstream-go's chat_test_helpers_test.go.
 */
abstract class ChatTestCase extends TestCase
{
    protected Client $client;

    /** @var string[] User IDs created during the test, cleaned up in tearDown */
    protected array $createdUserIDs = [];

    /** @var array{type: string, id: string}[] Channels created during the test, cleaned up in tearDown */
    protected array $createdChannels = [];

    protected function setUp(): void
    {
        $this->client = ClientBuilder::fromEnv()->build();
    }

    protected function tearDown(): void
    {
        // Hard-delete channels first (they reference users)
        foreach (array_reverse($this->createdChannels) as $ch) {
            try {
                $this->deleteChannel($ch['type'], $ch['id'], hardDelete: true);
            } catch (\Exception $e) {
                // Ignore cleanup errors
            }
        }

        // Hard-delete users with retry (rate limiting)
        if (!empty($this->createdUserIDs)) {
            $this->deleteUsersWithRetry($this->createdUserIDs);
        }

        parent::tearDown();
    }

    // =========================================================================
    // Test Helpers
    // =========================================================================

    /**
     * Create n test users with unique IDs.
     *
     * @return string[] Array of created user IDs
     */
    protected function createTestUsers(int $n): array
    {
        $users = [];
        $ids = [];
        for ($i = 0; $i < $n; $i++) {
            $id = 'test-user-' . uniqid();
            $ids[] = $id;
            $users[$id] = new GeneratedModels\UserRequest(
                id: $id,
                name: 'Test User ' . substr($id, 0, 8),
                role: 'user',
            );
        }

        $response = $this->client->updateUsers(new GeneratedModels\UpdateUsersRequest(
            users: $users,
        ));
        $this->assertResponseSuccess($response, 'create test users');

        // Track for cleanup
        array_push($this->createdUserIDs, ...$ids);

        return $ids;
    }

    /**
     * Create a messaging channel with a unique ID.
     *
     * @return array{0: string, 1: string} [channelType, channelID]
     */
    protected function createTestChannel(string $creatorID): array
    {
        $channelType = 'messaging';
        $channelID = 'test-ch-' . uniqid();

        $response = $this->getOrCreateChannel($channelType, $channelID, new GeneratedModels\ChannelGetOrCreateRequest(
            data: new GeneratedModels\ChannelInput(
                createdByID: $creatorID,
            ),
        ));
        $this->assertResponseSuccess($response, 'create test channel');

        // Track for cleanup
        $this->createdChannels[] = ['type' => $channelType, 'id' => $channelID];

        return [$channelType, $channelID];
    }

    /**
     * Create a messaging channel with members.
     *
     * @param string[] $memberIDs
     * @return array{0: string, 1: string} [channelType, channelID]
     */
    protected function createTestChannelWithMembers(string $creatorID, array $memberIDs): array
    {
        $channelType = 'messaging';
        $channelID = 'test-ch-' . uniqid();

        $members = array_map(
            fn(string $id) => new GeneratedModels\ChannelMemberRequest(userID: $id),
            $memberIDs,
        );

        $response = $this->getOrCreateChannel($channelType, $channelID, new GeneratedModels\ChannelGetOrCreateRequest(
            data: new GeneratedModels\ChannelInput(
                createdByID: $creatorID,
                members: $members,
            ),
        ));
        $this->assertResponseSuccess($response, 'create test channel with members');

        // Track for cleanup
        $this->createdChannels[] = ['type' => $channelType, 'id' => $channelID];

        return [$channelType, $channelID];
    }

    /**
     * Send a test message to a channel.
     *
     * @return string The message ID
     */
    protected function sendTestMessage(string $channelType, string $channelID, string $userID, string $text): string
    {
        $response = $this->sendMessage($channelType, $channelID, new GeneratedModels\SendMessageRequest(
            message: new GeneratedModels\MessageRequest(
                text: $text,
                userID: $userID,
            ),
        ));
        $this->assertResponseSuccess($response, 'send test message');

        $data = $response->getData();
        self::assertNotNull($data->message, 'Message should not be null in response');
        self::assertNotEmpty($data->message->id, 'Message ID should not be empty');

        return $data->message->id;
    }

    /**
     * Delete users with retry logic for rate limiting.
     * Follows the pattern from getstream-go's deleteUsersWithRetry.
     *
     * @param string[] $userIDs
     */
    protected function deleteUsersWithRetry(array $userIDs): void
    {
        for ($i = 0; $i < 10; $i++) {
            try {
                $this->client->deleteUsers(new GeneratedModels\DeleteUsersRequest(
                    userIds: $userIDs,
                    user: 'hard',
                    messages: 'hard',
                    conversations: 'hard',
                ));
                return;
            } catch (\Exception $e) {
                if (strpos($e->getMessage(), 'Too many requests') === false) {
                    return;
                }
                sleep(($i + 1) * 3);
            }
        }
    }

    /**
     * Poll an async task until completed or failed.
     * Follows the pattern from getstream-go's WaitForTask.
     */
    protected function waitForTask(string $taskID): GeneratedModels\GetTaskResponse
    {
        for ($i = 0; $i < 30; $i++) {
            $response = $this->client->getTask($taskID);
            $this->assertResponseSuccess($response, 'get task status');

            $data = $response->getData();
            if ($data->status === 'completed' || $data->status === 'failed') {
                return $data;
            }
            sleep(1);
        }

        self::fail("Task {$taskID} did not complete after 30 attempts");
    }

    /**
     * Generate a random alphanumeric string.
     */
    protected function randomString(int $length = 12): string
    {
        return substr(bin2hex(random_bytes((int) ceil($length / 2))), 0, $length);
    }

    // =========================================================================
    // Channel API Wrappers (since PHP SDK lacks a ChatClient)
    // These wrap $client->makeRequest() for channel-level operations.
    // =========================================================================

    /**
     * @return StreamResponse<GeneratedModels\ChannelStateResponse>
     */
    protected function getOrCreateChannel(string $type, string $id, GeneratedModels\ChannelGetOrCreateRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/channels/{$type}/{$id}/query", [], $request),
            GeneratedModels\ChannelStateResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\SendMessageResponse>
     */
    protected function sendMessage(string $type, string $id, GeneratedModels\SendMessageRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/channels/{$type}/{$id}/message", [], $request),
            GeneratedModels\SendMessageResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\DeleteChannelResponse>
     */
    protected function deleteChannel(string $type, string $id, bool $hardDelete = false): StreamResponse
    {
        $queryParams = [];
        if ($hardDelete) {
            $queryParams['hard_delete'] = 'true';
        }

        return StreamResponse::fromJson(
            $this->client->makeRequest('DELETE', "/api/v2/chat/channels/{$type}/{$id}", $queryParams),
            GeneratedModels\DeleteChannelResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\QueryChannelsResponse>
     */
    protected function queryChannels(GeneratedModels\QueryChannelsRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/chat/channels', [], $request),
            GeneratedModels\QueryChannelsResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UpdateChannelResponse>
     */
    protected function updateChannel(string $type, string $id, GeneratedModels\UpdateChannelRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/channels/{$type}/{$id}", [], $request),
            GeneratedModels\UpdateChannelResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UpdateChannelPartialResponse>
     */
    protected function updateChannelPartial(string $type, string $id, GeneratedModels\UpdateChannelPartialRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('PATCH', "/api/v2/chat/channels/{$type}/{$id}", [], $request),
            GeneratedModels\UpdateChannelPartialResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\DeleteChannelsResponse>
     */
    protected function deleteChannelsBatch(GeneratedModels\DeleteChannelsRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/chat/channels/delete', [], $request),
            GeneratedModels\DeleteChannelsResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\HideChannelResponse>
     */
    protected function hideChannel(string $type, string $id, GeneratedModels\HideChannelRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/channels/{$type}/{$id}/hide", [], $request),
            GeneratedModels\HideChannelResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\ShowChannelResponse>
     */
    protected function showChannel(string $type, string $id, GeneratedModels\ShowChannelRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/channels/{$type}/{$id}/show", [], $request),
            GeneratedModels\ShowChannelResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\TruncateChannelResponse>
     */
    protected function truncateChannel(string $type, string $id, GeneratedModels\TruncateChannelRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/channels/{$type}/{$id}/truncate", [], $request),
            GeneratedModels\TruncateChannelResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\MarkReadResponse>
     */
    protected function markRead(string $type, string $id, GeneratedModels\MarkReadRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/channels/{$type}/{$id}/read", [], $request),
            GeneratedModels\MarkReadResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\Response>
     */
    protected function markUnread(string $type, string $id, GeneratedModels\MarkUnreadRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/channels/{$type}/{$id}/unread", [], $request),
            GeneratedModels\Response::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\MuteChannelResponse>
     */
    protected function muteChannel(GeneratedModels\MuteChannelRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/chat/moderation/mute/channel', [], $request),
            GeneratedModels\MuteChannelResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UnmuteResponse>
     */
    protected function unmuteChannel(GeneratedModels\UnmuteChannelRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/chat/moderation/unmute/channel', [], $request),
            GeneratedModels\UnmuteResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UpdateMemberPartialResponse>
     */
    protected function updateMemberPartial(string $type, string $id, string $userID, GeneratedModels\UpdateMemberPartialRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('PATCH', "/api/v2/chat/channels/{$type}/{$id}/member", ['user_id' => $userID], $request),
            GeneratedModels\UpdateMemberPartialResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\MembersResponse>
     */
    protected function queryMembers(GeneratedModels\QueryMembersPayload $payload): StreamResponse
    {
        $queryParams = ['payload' => json_encode($payload->toArray())];
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', '/api/v2/chat/members', $queryParams),
            GeneratedModels\MembersResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\EventResponse>
     */
    protected function sendEvent(string $type, string $id, GeneratedModels\SendEventRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/channels/{$type}/{$id}/event", [], $request),
            GeneratedModels\EventResponse::class,
        );
    }

    /**
     * Create a distinct channel (without explicit ID).
     *
     * @return StreamResponse<GeneratedModels\ChannelStateResponse>
     */
    protected function getOrCreateDistinctChannel(string $type, GeneratedModels\ChannelGetOrCreateRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/channels/{$type}/query", [], $request),
            GeneratedModels\ChannelStateResponse::class,
        );
    }

    // =========================================================================
    // Message API Wrappers
    // =========================================================================

    /**
     * @return StreamResponse<GeneratedModels\GetMessageResponse>
     */
    protected function getMessage(string $messageID): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', "/api/v2/chat/messages/{$messageID}"),
            GeneratedModels\GetMessageResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\GetManyMessagesResponse>
     */
    protected function getManyMessages(string $type, string $id, array $messageIDs): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', "/api/v2/chat/channels/{$type}/{$id}/messages", ['ids' => implode(',', $messageIDs)]),
            GeneratedModels\GetManyMessagesResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UpdateMessageResponse>
     */
    protected function updateMessage(string $messageID, GeneratedModels\UpdateMessageRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/messages/{$messageID}", [], $request),
            GeneratedModels\UpdateMessageResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UpdateMessagePartialResponse>
     */
    protected function updateMessagePartial(string $messageID, GeneratedModels\UpdateMessagePartialRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('PUT', "/api/v2/chat/messages/{$messageID}", [], $request),
            GeneratedModels\UpdateMessagePartialResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\DeleteMessageResponse>
     */
    protected function deleteMessageApi(string $messageID, bool $hard = false, ?string $deletedBy = null, bool $deleteForMe = false): StreamResponse
    {
        $queryParams = [];
        if ($hard) {
            $queryParams['hard'] = 'true';
        }
        if ($deletedBy !== null) {
            $queryParams['deleted_by'] = $deletedBy;
        }
        if ($deleteForMe) {
            $queryParams['delete_for_me'] = 'true';
        }

        return StreamResponse::fromJson(
            $this->client->makeRequest('DELETE', "/api/v2/chat/messages/{$messageID}", $queryParams),
            GeneratedModels\DeleteMessageResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\MessageActionResponse>
     */
    protected function translateMessage(string $messageID, GeneratedModels\TranslateMessageRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/messages/{$messageID}/translate", [], $request),
            GeneratedModels\MessageActionResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\GetRepliesResponse>
     */
    protected function getReplies(string $parentID, array $queryParams = []): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', "/api/v2/chat/messages/{$parentID}/replies", $queryParams),
            GeneratedModels\GetRepliesResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\SearchResponse>
     */
    protected function searchMessages(GeneratedModels\SearchPayload $payload): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', '/api/v2/chat/search', ['payload' => json_encode($payload->toArray())]),
            GeneratedModels\SearchResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\MessageActionResponse>
     */
    protected function commitMessage(string $messageID): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/messages/{$messageID}/commit", [], new GeneratedModels\CommitMessageRequest()),
            GeneratedModels\MessageActionResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UndeleteMessageResponse>
     */
    protected function undeleteMessage(string $messageID, GeneratedModels\UndeleteMessageRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/messages/{$messageID}/undelete", [], $request),
            GeneratedModels\UndeleteMessageResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\QueryMessageHistoryResponse>
     */
    protected function queryMessageHistory(GeneratedModels\QueryMessageHistoryRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/chat/messages/history', [], $request),
            GeneratedModels\QueryMessageHistoryResponse::class,
        );
    }

    // =========================================================================
    // Reaction API Wrappers
    // =========================================================================

    /**
     * @return StreamResponse<GeneratedModels\SendReactionResponse>
     */
    protected function sendReaction(string $messageID, GeneratedModels\SendReactionRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/messages/{$messageID}/reaction", [], $request),
            GeneratedModels\SendReactionResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\GetReactionsResponse>
     */
    protected function getReactions(string $messageID, int $limit = 0, int $offset = 0): StreamResponse
    {
        $queryParams = [];
        if ($limit > 0) {
            $queryParams['limit'] = (string) $limit;
        }
        if ($offset > 0) {
            $queryParams['offset'] = (string) $offset;
        }

        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', "/api/v2/chat/messages/{$messageID}/reactions", $queryParams),
            GeneratedModels\GetReactionsResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\DeleteReactionResponse>
     */
    protected function deleteReaction(string $messageID, string $reactionType, string $userID): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('DELETE', "/api/v2/chat/messages/{$messageID}/reaction/{$reactionType}", ['user_id' => $userID]),
            GeneratedModels\DeleteReactionResponse::class,
        );
    }

    // =========================================================================
    // Poll API Wrappers
    // =========================================================================

    /**
     * @return StreamResponse<GeneratedModels\PollResponse>
     */
    protected function createPoll(GeneratedModels\CreatePollRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/polls', [], $request),
            GeneratedModels\PollResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\PollResponse>
     */
    protected function getPoll(string $pollID): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', "/api/v2/polls/{$pollID}"),
            GeneratedModels\PollResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\QueryPollsResponse>
     */
    protected function queryPolls(GeneratedModels\QueryPollsRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/polls/query', [], $request),
            GeneratedModels\QueryPollsResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\Response>
     */
    protected function deletePoll(string $pollID, ?string $userID = null): StreamResponse
    {
        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }

        return StreamResponse::fromJson(
            $this->client->makeRequest('DELETE', "/api/v2/polls/{$pollID}", $queryParams),
            GeneratedModels\Response::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\PollVoteResponse>
     */
    protected function castPollVote(string $messageID, string $pollID, GeneratedModels\CastPollVoteRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/messages/{$messageID}/polls/{$pollID}/vote", [], $request),
            GeneratedModels\PollVoteResponse::class,
        );
    }

    // =========================================================================
    // Command API Wrappers
    // =========================================================================

    /**
     * @return StreamResponse<GeneratedModels\CreateCommandResponse>
     */
    protected function createCommand(GeneratedModels\CreateCommandRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/chat/commands', [], $request),
            GeneratedModels\CreateCommandResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\GetCommandResponse>
     */
    protected function getCommand(string $name): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', "/api/v2/chat/commands/{$name}"),
            GeneratedModels\GetCommandResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\ListCommandsResponse>
     */
    protected function listCommands(): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', '/api/v2/chat/commands'),
            GeneratedModels\ListCommandsResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UpdateCommandResponse>
     */
    protected function updateCommand(string $name, GeneratedModels\UpdateCommandRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('PUT', "/api/v2/chat/commands/{$name}", [], $request),
            GeneratedModels\UpdateCommandResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\DeleteCommandResponse>
     */
    protected function deleteCommandApi(string $name): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('DELETE', "/api/v2/chat/commands/{$name}"),
            GeneratedModels\DeleteCommandResponse::class,
        );
    }

    // =========================================================================
    // Channel Type API Wrappers
    // =========================================================================

    /**
     * @return StreamResponse<GeneratedModels\CreateChannelTypeResponse>
     */
    protected function createChannelType(GeneratedModels\CreateChannelTypeRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/chat/channeltypes', [], $request),
            GeneratedModels\CreateChannelTypeResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\GetChannelTypeResponse>
     */
    protected function getChannelType(string $name): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', "/api/v2/chat/channeltypes/{$name}"),
            GeneratedModels\GetChannelTypeResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\ListChannelTypesResponse>
     */
    protected function listChannelTypes(): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', '/api/v2/chat/channeltypes'),
            GeneratedModels\ListChannelTypesResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UpdateChannelTypeResponse>
     */
    protected function updateChannelType(string $name, GeneratedModels\UpdateChannelTypeRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('PUT', "/api/v2/chat/channeltypes/{$name}", [], $request),
            GeneratedModels\UpdateChannelTypeResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\Response>
     */
    protected function deleteChannelType(string $name): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('DELETE', "/api/v2/chat/channeltypes/{$name}"),
            GeneratedModels\Response::class,
        );
    }

    // =========================================================================
    // Ban / Mute API Wrappers (Moderation)
    // =========================================================================

    /**
     * @return StreamResponse<GeneratedModels\BanResponse>
     */
    protected function banUser(GeneratedModels\BanRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/moderation/ban', [], $request),
            GeneratedModels\BanResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\Response>
     */
    protected function unbanUser(string $targetUserID, string $channelCid = ''): StreamResponse
    {
        $queryParams = ['target_user_id' => $targetUserID];
        if ($channelCid !== '') {
            $queryParams['channel_cid'] = $channelCid;
        }

        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/moderation/unban', $queryParams, new GeneratedModels\UnbanRequest()),
            GeneratedModels\Response::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\QueryBannedUsersResponse>
     */
    protected function queryBannedUsers(GeneratedModels\QueryBannedUsersPayload $payload): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', '/api/v2/chat/query_banned_users', ['payload' => json_encode($payload->toArray())]),
            GeneratedModels\QueryBannedUsersResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\MuteResponse>
     */
    protected function muteUser(GeneratedModels\MuteRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/moderation/mute', [], $request),
            GeneratedModels\MuteResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UnmuteResponse>
     */
    protected function unmuteUser(GeneratedModels\UnmuteRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/moderation/unmute', [], $request),
            GeneratedModels\UnmuteResponse::class,
        );
    }

    // =========================================================================
    // Flag API Wrappers
    // =========================================================================

    /**
     * @return StreamResponse<GeneratedModels\FlagResponse>
     */
    protected function flagContent(GeneratedModels\FlagRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/moderation/flag', [], $request),
            GeneratedModels\FlagResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\QueryMessageFlagsResponse>
     */
    protected function queryMessageFlags(GeneratedModels\QueryMessageFlagsPayload $payload): StreamResponse
    {
        $queryParams = ['payload' => json_encode($payload->toArray())];
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', '/api/v2/chat/moderation/flags/message', $queryParams),
            GeneratedModels\QueryMessageFlagsResponse::class,
        );
    }

    // =========================================================================
    // Export Channels API Wrapper
    // =========================================================================

    /**
     * @return StreamResponse<GeneratedModels\ExportChannelsResponse>
     */
    protected function exportChannels(GeneratedModels\ExportChannelsRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/chat/export_channels', [], $request),
            GeneratedModels\ExportChannelsResponse::class,
        );
    }

    // =========================================================================
    // Threads API Wrappers
    // =========================================================================

    /**
     * @return StreamResponse<GeneratedModels\QueryThreadsResponse>
     */
    protected function queryThreads(GeneratedModels\QueryThreadsRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/chat/threads', [], $request),
            GeneratedModels\QueryThreadsResponse::class,
        );
    }

    // =========================================================================
    // Unread Counts API Wrappers
    // =========================================================================

    /**
     * @return StreamResponse<GeneratedModels\WrappedUnreadCountsResponse>
     */
    protected function getUnreadCounts(string $userID): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', '/api/v2/chat/unread', ['user_id' => $userID]),
            GeneratedModels\WrappedUnreadCountsResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UnreadCountsBatchResponse>
     */
    protected function getUnreadCountsBatch(GeneratedModels\UnreadCountsBatchRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/chat/unread_batch', [], $request),
            GeneratedModels\UnreadCountsBatchResponse::class,
        );
    }

    // =========================================================================
    // Reminder API Wrappers
    // =========================================================================

    /**
     * @return StreamResponse<GeneratedModels\ReminderResponseData>
     */
    protected function createReminder(string $messageID, GeneratedModels\CreateReminderRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/messages/{$messageID}/reminders", [], $request),
            GeneratedModels\ReminderResponseData::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UpdateReminderResponse>
     */
    protected function updateReminder(string $messageID, GeneratedModels\UpdateReminderRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('PATCH', "/api/v2/chat/messages/{$messageID}/reminders", [], $request),
            GeneratedModels\UpdateReminderResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\DeleteReminderResponse>
     */
    protected function deleteReminderApi(string $messageID, string $userID): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('DELETE', "/api/v2/chat/messages/{$messageID}/reminders", ['user_id' => $userID]),
            GeneratedModels\DeleteReminderResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\QueryRemindersResponse>
     */
    protected function queryReminders(GeneratedModels\QueryRemindersRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/chat/reminders/query', [], $request),
            GeneratedModels\QueryRemindersResponse::class,
        );
    }

    // =========================================================================
    // Custom Event API Wrapper
    // =========================================================================

    /**
     * @return StreamResponse<GeneratedModels\Response>
     */
    protected function sendUserCustomEvent(string $userID, GeneratedModels\SendUserCustomEventRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/chat/users/{$userID}/event", [], $request),
            GeneratedModels\Response::class,
        );
    }

    // =========================================================================
    // Team Usage Stats API Wrapper
    // =========================================================================

    /**
     * @return StreamResponse<GeneratedModels\QueryTeamUsageStatsResponse>
     */
    protected function queryTeamUsageStats(GeneratedModels\QueryTeamUsageStatsRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/chat/stats/team_usage', [], $request),
            GeneratedModels\QueryTeamUsageStatsResponse::class,
        );
    }

    // =========================================================================
    // Assertion Helpers
    // =========================================================================

    protected function assertResponseSuccess(StreamResponse $response, string $operation): void
    {
        if (!$response->isSuccessful()) {
            self::fail("Failed to {$operation}. Status: {$response->getStatusCode()}, Body: {$response->getRawBody()}");
        }
    }
}
