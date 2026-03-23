<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\Client;
use GetStream\ClientBuilder;
use GetStream\GeneratedModels;
use GetStream\StreamResponse;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

/**
 * Base test case for Chat integration tests.
 *
 * Provides helper methods for creating/cleaning up test users, channels, and messages.
 * Follows the patterns established in getstream-go's chat_test_helpers_test.go.
 *
 * Subclasses can override sharedUserCount() to create shared users once per class
 * instead of per-test, dramatically reducing API calls and rate limiting.
 */
#[Group('integration')]
abstract class ChatTestCase extends TestCase
{
    protected Client $client;

    /** @var string[] User IDs created during the test, cleaned up in tearDown */
    protected array $createdUserIDs = [];

    /** @var array{type: string, id: string}[] Channels created during the test, cleaned up in tearDown */
    protected array $createdChannels = [];

    // =========================================================================
    // Video API Wrappers
    // =========================================================================

    /** @var string[] Call type names created during the test, cleaned up in tearDown */
    protected array $createdCallTypes = [];

    /** @var array{type: string, id: string}[] Calls created during the test, cleaned up in tearDown */
    protected array $createdCalls = [];

    /** @var string[] External storage names created during the test, cleaned up in tearDown */
    protected array $createdExternalStorages = [];

    // ------------------------------------------------------------------
    // Class-level shared user management (created once per test class)
    // ------------------------------------------------------------------

    /** @var array<string, Client> Class-level shared client keyed by class name */
    private static array $classClients = [];

    /** @var array<string, string[]> Class-level shared user IDs keyed by class name */
    private static array $classUserIDs = [];

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        $count = static::sharedUserCount();
        if ($count <= 0) {
            return;
        }

        $client = ClientBuilder::fromEnv()->build();
        self::$classClients[static::class] = $client;

        $users = [];
        $ids = [];
        for ($i = 0; $i < $count; $i++) {
            $id = 'test-user-' . uniqid();
            $ids[] = $id;
            $users[$id] = new GeneratedModels\UserRequest(
                id: $id,
                name: 'Shared User ' . $id,
                role: 'user',
            );
        }

        $client->updateUsers(new GeneratedModels\UpdateUsersRequest(users: $users));
        self::$classUserIDs[static::class] = $ids;
    }

    public static function tearDownAfterClass(): void
    {
        $class = static::class;
        $ids = self::$classUserIDs[$class] ?? [];
        $client = self::$classClients[$class] ?? null;

        if (!empty($ids) && $client !== null) {
            self::deleteUsersHardWithRetry($client, $ids);
        }

        unset(self::$classClients[$class], self::$classUserIDs[$class]);
        parent::tearDownAfterClass();
    }

    // ------------------------------------------------------------------
    // Per-test setup / teardown
    // ------------------------------------------------------------------

    protected function setUp(): void
    {
        // Reuse class-level client if available, otherwise create a new one
        $this->client = self::$classClients[static::class] ?? ClientBuilder::fromEnv()->build();
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

        // Hard-delete per-test users (not shared ones)
        if (!empty($this->createdUserIDs)) {
            $this->deleteUsersWithRetry($this->createdUserIDs);
        }

        parent::tearDown();
    }

    /**
     * Override to declare how many shared users this test class needs.
     * Return 0 (default) to opt-out and create users per-test instead.
     */
    protected static function sharedUserCount(): int
    {
        return 0;
    }

    /**
     * Get the class-level shared user IDs.
     *
     * @return string[]
     */
    protected function getSharedUserIDs(): array
    {
        return self::$classUserIDs[static::class] ?? [];
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
                name: 'Test User ' . $id,
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
     *
     * @return array{0: string, 1: string} [channelType, channelID]
     */
    protected function createTestChannelWithMembers(string $creatorID, array $memberIDs): array
    {
        $channelType = 'messaging';
        $channelID = 'test-ch-' . uniqid();

        $members = array_map(
            static fn (string $id) => new GeneratedModels\ChannelMemberRequest(userID: $id),
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
     * Retry a callable until it succeeds or max attempts exhausted.
     * Useful for eventually consistent API operations.
     *
     * @template T
     *
     * @param callable(): T $fn
     * @param int           $sleepMs milliseconds to wait between attempts
     *
     * @return T
     */
    protected function retryUntilSuccess(callable $fn, int $maxAttempts = 5, int $sleepMs = 500): mixed
    {
        $lastException = new \RuntimeException('retryUntilSuccess: no attempts made');
        for ($i = 0; $i < $maxAttempts; $i++) {
            try {
                return $fn();
            } catch (\Exception $e) {
                $lastException = $e;
                usleep($sleepMs * 1000);
            }
        }

        throw $lastException;
    }

    /**
     * Delete users with retry logic for rate limiting.
     * Delegates to the shared static implementation so both per-test and
     * class-level teardowns use the same jitter + backoff strategy.
     *
     * @param string[] $userIDs
     */
    protected function deleteUsersWithRetry(array $userIDs): void
    {
        self::deleteUsersHardWithRetry($this->client, $userIDs);
    }

    /**
     * Poll an async task until completed or failed.
     * Uses adaptive backoff: 100ms → 200ms → 400ms → 800ms → 1s (cap), up to 60 attempts (~60s max).
     */
    protected function waitForTask(string $taskID): GeneratedModels\GetTaskResponse
    {
        $maxAttempts = 60;
        for ($i = 0; $i < $maxAttempts; $i++) {
            $response = $this->client->getTask($taskID);
            $this->assertResponseSuccess($response, 'get task status');

            $data = $response->getData();
            if ($data->status === 'completed' || $data->status === 'failed') {
                return $data;
            }

            // Adaptive backoff: 100ms, 200ms, 400ms, 800ms, then cap at 1s
            $sleepMs = min(100 << min($i, 10), 1000);
            usleep($sleepMs * 1000);
        }

        self::fail("Task {$taskID} did not complete after {$maxAttempts} attempts");
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
    protected function queryPolls(GeneratedModels\QueryPollsRequest $request, ?string $userID = null): StreamResponse
    {
        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }

        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/polls/query', $queryParams, $request),
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

    /**
     * @return StreamResponse<GeneratedModels\CreateCallTypeResponse>
     */
    protected function createCallTypeVideo(GeneratedModels\CreateCallTypeRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/video/calltypes', [], $request),
            GeneratedModels\CreateCallTypeResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\GetCallTypeResponse>
     */
    protected function getCallTypeVideo(string $name): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', "/api/v2/video/calltypes/{$name}"),
            GeneratedModels\GetCallTypeResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UpdateCallTypeResponse>
     */
    protected function updateCallTypeVideo(string $name, GeneratedModels\UpdateCallTypeRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('PUT', "/api/v2/video/calltypes/{$name}", [], $request),
            GeneratedModels\UpdateCallTypeResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\Response>
     */
    protected function deleteCallTypeVideo(string $name): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('DELETE', "/api/v2/video/calltypes/{$name}"),
            GeneratedModels\Response::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\ListCallTypeResponse>
     */
    protected function listCallTypesVideo(): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', '/api/v2/video/calltypes'),
            GeneratedModels\ListCallTypeResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\GetOrCreateCallResponse>
     */
    protected function getOrCreateCall(string $type, string $id, GeneratedModels\GetOrCreateCallRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/video/call/{$type}/{$id}", [], $request),
            GeneratedModels\GetOrCreateCallResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\GetCallResponse>
     */
    protected function getCall(string $type, string $id): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('GET', "/api/v2/video/call/{$type}/{$id}"),
            GeneratedModels\GetCallResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UpdateCallResponse>
     */
    protected function updateCall(string $type, string $id, GeneratedModels\UpdateCallRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('PATCH', "/api/v2/video/call/{$type}/{$id}", [], $request),
            GeneratedModels\UpdateCallResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\DeleteCallResponse>
     */
    protected function deleteCall(string $type, string $id, GeneratedModels\DeleteCallRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/video/call/{$type}/{$id}/delete", [], $request),
            GeneratedModels\DeleteCallResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\BlockUserResponse>
     */
    protected function blockUserInCall(string $type, string $id, GeneratedModels\BlockUserRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/video/call/{$type}/{$id}/block", [], $request),
            GeneratedModels\BlockUserResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UnblockUserResponse>
     */
    protected function unblockUserInCall(string $type, string $id, GeneratedModels\UnblockUserRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/video/call/{$type}/{$id}/unblock", [], $request),
            GeneratedModels\UnblockUserResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\MuteUsersResponse>
     */
    protected function muteUsersInCall(string $type, string $id, GeneratedModels\MuteUsersRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/video/call/{$type}/{$id}/mute_users", [], $request),
            GeneratedModels\MuteUsersResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\SendCallEventResponse>
     */
    protected function sendCallEvent(string $type, string $id, GeneratedModels\SendCallEventRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/video/call/{$type}/{$id}/event", [], $request),
            GeneratedModels\SendCallEventResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UpdateUserPermissionsResponse>
     */
    protected function updateUserPermissionsInCall(string $type, string $id, GeneratedModels\UpdateUserPermissionsRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/video/call/{$type}/{$id}/user_permissions", [], $request),
            GeneratedModels\UpdateUserPermissionsResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\UpdateCallMembersResponse>
     */
    protected function updateCallMembers(string $type, string $id, GeneratedModels\UpdateCallMembersRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', "/api/v2/video/call/{$type}/{$id}/members", [], $request),
            GeneratedModels\UpdateCallMembersResponse::class,
        );
    }

    /**
     * @return StreamResponse<GeneratedModels\QueryCallsResponse>
     */
    protected function queryCalls(GeneratedModels\QueryCallsRequest $request): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('POST', '/api/v2/video/calls', [], $request),
            GeneratedModels\QueryCallsResponse::class,
        );
    }

    /**
     * Delete a recording from a call session (expects error for non-existent recordings).
     *
     * @return StreamResponse<GeneratedModels\Response>
     */
    protected function deleteRecording(string $type, string $id, string $session, string $filename): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('DELETE', "/api/v2/video/call/{$type}/{$id}/{$session}/recordings/{$filename}"),
            GeneratedModels\Response::class,
        );
    }

    /**
     * Delete a transcription from a call session (expects error for non-existent transcriptions).
     *
     * @return StreamResponse<GeneratedModels\Response>
     */
    protected function deleteTranscription(string $type, string $id, string $session, string $filename): StreamResponse
    {
        return StreamResponse::fromJson(
            $this->client->makeRequest('DELETE', "/api/v2/video/call/{$type}/{$id}/{$session}/transcriptions/{$filename}"),
            GeneratedModels\Response::class,
        );
    }

    /**
     * Clean up video resources (call types, calls, external storages).
     * Call from tearDown in video tests.
     */
    protected function cleanupVideoResources(): void
    {
        // Delete calls first
        foreach (array_reverse($this->createdCalls) as $call) {
            try {
                $this->deleteCall($call['type'], $call['id'], new GeneratedModels\DeleteCallRequest());
            } catch (\Exception $e) {
                // Ignore cleanup errors
            }
        }

        // Delete call types (need small delay for eventual consistency)
        foreach (array_reverse($this->createdCallTypes) as $name) {
            try {
                $this->deleteCallTypeVideo($name);
            } catch (\Exception $e) {
                // Ignore cleanup errors
            }
        }

        // Delete external storages
        foreach (array_reverse($this->createdExternalStorages) as $name) {
            try {
                $this->client->deleteExternalStorage($name);
            } catch (\Exception $e) {
                // Ignore cleanup errors
            }
        }
    }

    /**
     * Create a call and track it for cleanup.
     */
    protected function createTrackedCall(string $type, string $id, string $creatorID): GeneratedModels\GetOrCreateCallResponse
    {
        $response = $this->getOrCreateCall($type, $id, new GeneratedModels\GetOrCreateCallRequest(
            data: new GeneratedModels\CallRequest(
                createdByID: $creatorID,
            ),
        ));
        $this->assertResponseSuccess($response, 'create call');
        $this->createdCalls[] = ['type' => $type, 'id' => $id];

        return $response->getData();
    }

    // =========================================================================
    // Assertion Helpers
    // =========================================================================

    protected function assertResponseSuccess(StreamResponse $response, string $operation): void
    {
        self::assertTrue(
            $response->isSuccessful(),
            "Failed to {$operation}. Status: {$response->getStatusCode()}, Body: {$response->getRawBody()}"
        );
    }

    /**
     * Delete users with retry and jitter to avoid the DeleteUsers rate limit (6/min).
     * With 8 parallel paratest workers all tearing down at the same time, a burst
     * of concurrent calls easily exceeds the limit. A random initial jitter spreads
     * the calls across the minute window before any retry backoff kicks in.
     *
     * @param string[] $userIDs
     */
    private static function deleteUsersHardWithRetry(Client $client, array $userIDs): void
    {
        // Jitter 0-4s to spread concurrent teardown calls from parallel workers
        usleep(random_int(0, 4000000));

        for ($i = 0; $i < 8; $i++) {
            try {
                $client->deleteUsers(new GeneratedModels\DeleteUsersRequest(
                    userIds: $userIDs,
                    user: 'hard',
                    messages: 'hard',
                    conversations: 'hard',
                ));

                return;
            } catch (\Exception $e) {
                if (strpos($e->getMessage(), 'Too many requests') === false
                    && strpos($e->getMessage(), '429') === false) {
                    // Non-rate-limit error during cleanup — ignore it
                    return;
                }
                // Exponential backoff: 2s, 4s, 8s, 16s … capped at 30s
                sleep(min(2 ** ($i + 1), 30));
            }
        }
    }
}
