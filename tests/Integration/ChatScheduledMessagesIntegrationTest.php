<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\ChatClient;
use GetStream\ClientBuilder;
use GetStream\Exceptions\StreamApiException;
use GetStream\GeneratedModels;
use PHPUnit\Framework\Attributes\Group;

/**
 * Integration tests for Chat scheduled messages.
 *
 * Scheduled messages are off by default per app, and backends without the
 * feature ignore scheduled_at and send the message right away. Both cases skip.
 */
#[Group('integration')]
class ChatScheduledMessagesIntegrationTest extends ChatTestCase
{
    /** API error code returned when scheduled messages are off for the app */
    private const SCHEDULED_MESSAGES_DISABLED = 114;

    private ChatClient $chat;
    private string $userID;

    protected static function sharedUserCount(): int
    {
        return 1;
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->chat = ClientBuilder::fromEnv()->buildChatClient();
        $this->userID = $this->getSharedUserIDs()[0];
    }

    /**
     * @test
     */
    public function schedulesUpdatesAndSendsAMessageNow(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);
        $cid = "{$type}:{$channelID}";

        $scheduled = $this->scheduleMessage($type, $channelID, 'Scheduled from PHP SDK');
        self::assertSame('scheduled', $scheduled->status);
        self::assertSame($cid, $scheduled->cid);
        self::assertSame('Scheduled from PHP SDK', $scheduled->message->text);

        $queryResp = $this->chat->queryScheduledMessages(new GeneratedModels\QueryScheduledMessagesRequest(
            filter: new GeneratedModels\ScheduledMessagesFilter(cid: $cid),
            userID: $this->userID,
        ));
        $this->assertResponseSuccess($queryResp, 'query scheduled messages');
        $found = $queryResp->getData()->scheduledMessages;
        self::assertCount(1, $found);
        self::assertSame($scheduled->id, $found[0]->id);

        $scheduledAt = new \DateTime('+2 hours');
        $updateResp = $this->chat->updateScheduledMessage($scheduled->id, new GeneratedModels\UpdateScheduledMessageRequest(
            message: new GeneratedModels\MessageRequest(text: 'Rescheduled from PHP SDK'),
            scheduledAt: $scheduledAt,
        ));
        $this->assertResponseSuccess($updateResp, 'update scheduled message');
        $updated = $updateResp->getData()->scheduledMessage;
        self::assertSame('Rescheduled from PHP SDK', $updated->message->text);
        self::assertSame($scheduledAt->getTimestamp(), $updated->scheduledAt->getTimestamp());

        $sendResp = $this->chat->sendScheduledMessageNow($scheduled->id, new GeneratedModels\SendScheduledMessageNowRequest());
        $this->assertResponseSuccess($sendResp, 'send scheduled message now');
        self::assertSame($scheduled->id, $sendResp->getData()->scheduledMessage->id);
    }

    /**
     * @test
     */
    public function deletesAScheduledMessage(): void
    {
        [$type, $channelID] = $this->createTestChannelWithMembers($this->userID, [$this->userID]);

        $scheduled = $this->scheduleMessage($type, $channelID, 'Deleted before sending');

        $deleteResp = $this->chat->deleteScheduledMessage($scheduled->id);
        $this->assertResponseSuccess($deleteResp, 'delete scheduled message');
        self::assertSame($scheduled->id, $deleteResp->getData()->scheduledMessage->id);
        self::assertSame('canceled', $deleteResp->getData()->scheduledMessage->status);

        $queryResp = $this->chat->queryScheduledMessages(new GeneratedModels\QueryScheduledMessagesRequest(
            filter: new GeneratedModels\ScheduledMessagesFilter(cid: "{$type}:{$channelID}"),
            userID: $this->userID,
        ));
        $this->assertResponseSuccess($queryResp, 'query scheduled messages');
        self::assertCount(0, $queryResp->getData()->scheduledMessages);
    }

    /**
     * Schedules a message an hour ahead, skipping the test when the app or
     * backend does not support scheduled messages.
     */
    private function scheduleMessage(string $type, string $channelID, string $text): GeneratedModels\ScheduledMessageResponse
    {
        try {
            $resp = $this->sendMessage($type, $channelID, new GeneratedModels\SendMessageRequest(
                message: new GeneratedModels\MessageRequest(text: $text, userID: $this->userID),
                scheduledAt: new \DateTime('+1 hour'),
            ));
        } catch (StreamApiException $e) {
            if ($e->getApiErrorCode() === self::SCHEDULED_MESSAGES_DISABLED) {
                self::markTestSkipped('Scheduled messages are not enabled for this app');
            }

            throw $e;
        }
        $this->assertResponseSuccess($resp, 'schedule message');

        $scheduled = $resp->getData()->scheduledMessage;
        if ($scheduled === null) {
            self::markTestSkipped('Backend ignored scheduled_at and sent the message immediately');
        }

        return $scheduled;
    }
}
