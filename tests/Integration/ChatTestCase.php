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
    // Assertion Helpers
    // =========================================================================

    protected function assertResponseSuccess(StreamResponse $response, string $operation): void
    {
        if (!$response->isSuccessful()) {
            self::fail("Failed to {$operation}. Status: {$response->getStatusCode()}, Body: {$response->getRawBody()}");
        }
    }
}
