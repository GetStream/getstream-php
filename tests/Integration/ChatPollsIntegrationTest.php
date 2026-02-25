<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\GeneratedModels;
use GetStream\StreamResponse;

/**
 * Integration tests for Chat Polls.
 * Follows the patterns from getstream-go/chat_polls_integration_test.go.
 */
class ChatPollsIntegrationTest extends ChatTestCase
{
    /** @var string[] Poll IDs created during the test, cleaned up in tearDown */
    private array $createdPollIDs = [];

    /** @var string|null User ID to use for poll cleanup */
    private ?string $pollCleanupUserID = null;

    protected function tearDown(): void
    {
        // Delete polls before users/channels
        foreach ($this->createdPollIDs as $pollID) {
            try {
                $this->deletePoll($pollID, $this->pollCleanupUserID);
            } catch (\Exception $e) {
                // Ignore cleanup errors
            }
        }

        parent::tearDown();
    }

    /**
     * Test creating a poll with options, querying it by ID, and verifying the results.
     */
    public function testCreateAndQueryPoll(): void
    {
        $userIDs = $this->createTestUsers(1);
        $this->pollCleanupUserID = $userIDs[0];

        // Create a poll
        try {
            $createResp = $this->createPoll(new GeneratedModels\CreatePollRequest(
                name: 'Favorite color?',
                description: 'Pick your favorite color',
                enforceUniqueVote: true,
                userID: $userIDs[0],
                options: [
                    new GeneratedModels\PollOptionInput(text: 'Red'),
                    new GeneratedModels\PollOptionInput(text: 'Blue'),
                    new GeneratedModels\PollOptionInput(text: 'Green'),
                ],
            ));
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'Polls are not enabled') || str_contains($e->getMessage(), 'polls') && str_contains($e->getMessage(), 'not enabled')) {
                $this->markTestSkipped('Polls feature not enabled for this app');
            }
            throw $e;
        }

        $this->assertResponseSuccess($createResp, 'create poll');
        $poll = $createResp->getData()->poll;
        $this->assertNotNull($poll);
        $this->assertNotEmpty($poll->id);
        $this->assertEquals('Favorite color?', $poll->name);
        $this->assertEquals('Pick your favorite color', $poll->description);
        $this->assertTrue($poll->enforceUniqueVote);
        $this->assertNotNull($poll->options);
        $this->assertCount(3, $poll->options);

        $pollID = $poll->id;
        $this->createdPollIDs[] = $pollID;

        // Get the poll by ID
        $getResp = $this->getPoll($pollID);
        $this->assertResponseSuccess($getResp, 'get poll');
        $this->assertEquals($pollID, $getResp->getData()->poll->id);
        $this->assertEquals('Favorite color?', $getResp->getData()->poll->name);

        // Query polls with filter by ID
        $queryResp = $this->queryPolls(new GeneratedModels\QueryPollsRequest(
            filter: (object) ['id' => $pollID],
        ), $userIDs[0]);
        $this->assertResponseSuccess($queryResp, 'query polls');
        $this->assertNotNull($queryResp->getData()->polls);
        $this->assertGreaterThanOrEqual(1, count($queryResp->getData()->polls));

        $found = false;
        foreach ($queryResp->getData()->polls as $p) {
            if ($p->id === $pollID) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, 'Poll should be found in query results');
    }

    /**
     * Test creating a poll, attaching it to a message, and casting a vote.
     */
    public function testCastPollVote(): void
    {
        $userIDs = $this->createTestUsers(2);
        $this->pollCleanupUserID = $userIDs[0];

        // Create a poll with enforce_unique_vote
        try {
            $createResp = $this->createPoll(new GeneratedModels\CreatePollRequest(
                name: 'Vote test poll',
                enforceUniqueVote: true,
                userID: $userIDs[0],
                options: [
                    new GeneratedModels\PollOptionInput(text: 'Yes'),
                    new GeneratedModels\PollOptionInput(text: 'No'),
                ],
            ));
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'Polls are not enabled') || str_contains($e->getMessage(), 'polls') && str_contains($e->getMessage(), 'not enabled')) {
                $this->markTestSkipped('Polls feature not enabled for this app');
            }
            throw $e;
        }

        $this->assertResponseSuccess($createResp, 'create vote test poll');
        $poll = $createResp->getData()->poll;
        $this->assertNotNull($poll);
        $pollID = $poll->id;
        $this->createdPollIDs[] = $pollID;

        $this->assertNotNull($poll->options);
        $this->assertGreaterThanOrEqual(2, count($poll->options));
        $optionID = $poll->options[0]->id;
        $this->assertNotEmpty($optionID);

        // Create a channel and send a message with the poll attached
        [$type, $id] = $this->createTestChannelWithMembers($userIDs[0], $userIDs);

        try {
            $msgResp = $this->sendMessage($type, $id, new GeneratedModels\SendMessageRequest(
                message: new GeneratedModels\MessageRequest(
                    text: 'Please vote!',
                    userID: $userIDs[0],
                    pollID: $pollID,
                ),
            ));
        } catch (\Exception $e) {
            if (str_contains($e->getMessage(), 'polls not enabled') || str_contains($e->getMessage(), 'Polls are not enabled')) {
                $this->markTestSkipped('Polls not enabled for this channel type');
            }
            throw $e;
        }
        $this->assertResponseSuccess($msgResp, 'send message with poll');
        $msgID = $msgResp->getData()->message->id;
        $this->assertNotEmpty($msgID);

        // Cast a vote from the second user
        $voteResp = $this->castPollVote($msgID, $pollID, new GeneratedModels\CastPollVoteRequest(
            userID: $userIDs[1],
            vote: new GeneratedModels\VoteData(
                optionID: $optionID,
            ),
        ));
        $this->assertResponseSuccess($voteResp, 'cast poll vote');
        $this->assertNotNull($voteResp->getData()->vote);
        $this->assertEquals($optionID, $voteResp->getData()->vote->optionID);

        // Verify the poll has votes by getting it again
        $getResp = $this->getPoll($pollID);
        $this->assertResponseSuccess($getResp, 'get poll after vote');
        $this->assertNotNull($getResp->getData()->poll);
        $this->assertEquals(1, $getResp->getData()->poll->voteCount);
    }
}
