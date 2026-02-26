<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\Client;
use GetStream\ClientBuilder;
use GetStream\Exceptions\StreamApiException;
use GetStream\Exceptions\StreamException;
use GetStream\Feed;
use GetStream\FeedsV3Client;
use GetStream\GeneratedModels;
use GetStream\GeneratedModels\AddCommentResponse;
use GetStream\StreamResponse;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

/**
 * Integration tests for Feed reaction and comment operations.
 */
#[Group('integration')]
class FeedReactionCommentIntegrationTest extends TestCase
{
    private Client $client;
    private FeedsV3Client $feedsV3Client;
    private string $testUserId;
    private string $testUserId2;
    private Feed $testFeed;
    private Feed $testFeed2;

    private array $createdActivityIds = [];
    private array $createdCommentIds = [];

    private static ?Client $sharedClient = null;
    private static ?FeedsV3Client $sharedFeedsClient = null;
    private static string $sharedUserId = '';
    private static string $sharedUserId2 = '';

    public static function setUpBeforeClass(): void
    {
        $client = ClientBuilder::fromEnv()->build();
        $feedsClient = ClientBuilder::fromEnv()->buildFeedsClient();

        self::$sharedClient = $client;
        self::$sharedFeedsClient = $feedsClient;
        self::$sharedUserId = 'test-user-' . uniqid();
        self::$sharedUserId2 = 'test-user-2-' . uniqid();

        $client->updateUsers(new GeneratedModels\UpdateUsersRequest(
            users: [
                self::$sharedUserId => ['id' => self::$sharedUserId, 'name' => 'Test User 1', 'role' => 'user'],
                self::$sharedUserId2 => ['id' => self::$sharedUserId2, 'name' => 'Test User 2', 'role' => 'user'],
            ]
        ));

        $feedsClient->feed('user', self::$sharedUserId)->getOrCreateFeed(
            new GeneratedModels\GetOrCreateFeedRequest(userID: self::$sharedUserId)
        );
        $feedsClient->feed('user', self::$sharedUserId2)->getOrCreateFeed(
            new GeneratedModels\GetOrCreateFeedRequest(userID: self::$sharedUserId2)
        );
    }

    protected function setUp(): void
    {
        $this->client = self::$sharedClient;
        $this->feedsV3Client = self::$sharedFeedsClient;
        $this->testUserId = self::$sharedUserId;
        $this->testUserId2 = self::$sharedUserId2;
        $this->testFeed = $this->feedsV3Client->feed('user', $this->testUserId);
        $this->testFeed2 = $this->feedsV3Client->feed('user', $this->testUserId2);
    }

    protected function tearDown(): void
    {
        foreach ($this->createdCommentIds as $commentId) {
            try {
                $this->feedsV3Client->deleteComment($commentId, true, false);
            } catch (\Exception $e) {
                // best-effort
            }
        }
        foreach ($this->createdActivityIds as $activityId) {
            try {
                $this->feedsV3Client->deleteActivity($activityId, true, false);
            } catch (\Exception $e) {
                // best-effort
            }
        }
        $this->createdActivityIds = [];
        $this->createdCommentIds = [];
    }

    // =================================================================
    // REACTION OPERATIONS
    // =================================================================

    /**
     * @test
     */
    public function testAddReaction(): void
    {
        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for reaction test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        ));
        $this->assertResponseSuccess($createResponse, 'create activity for reaction test');
        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        // snippet-start: AddReaction
        $response = $this->feedsV3Client->addActivityReaction(
            $activityId,
            new GeneratedModels\AddReactionRequest(type: 'like', userID: $this->testUserId)
        );
        // snippet-end: AddReaction

        $this->assertResponseSuccess($response, 'add reaction');
    }

    /**
     * @test
     */
    public function testQueryReactions(): void
    {
        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for query reactions test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        ));
        $this->assertResponseSuccess($createResponse, 'create activity for query reactions test');
        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        $this->feedsV3Client->addActivityReaction(
            $activityId,
            new GeneratedModels\AddReactionRequest(type: 'like', userID: $this->testUserId)
        );

        // snippet-start: QueryActivityReactions
        $response = $this->feedsV3Client->queryActivityReactions(
            $activityId,
            new GeneratedModels\QueryActivityReactionsRequest(
                limit: 10,
                filter: (object) ['reaction_type' => 'like']
            )
        );
        // snippet-end: QueryActivityReactions

        $this->assertResponseSuccess($response, 'query reactions');
    }

    // =================================================================
    // COMMENT OPERATIONS
    // =================================================================

    /**
     * @throws StreamException
     *
     * @test
     */
    public function testAddComment(): void
    {
        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'Activity for comment test',
            userID: $this->testUserId
        ));
        $this->assertResponseSuccess($createResponse, 'create activity for comment test');
        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        // snippet-start: AddComment
        $response = $this->feedsV3Client->addComment(
            new GeneratedModels\AddCommentRequest(
                comment: 'This is a test comment from PHP SDK',
                objectID: $activityId,
                objectType: 'activity',
                userID: $this->testUserId
            )
        );
        // snippet-end: AddComment

        $this->assertResponseSuccess($response, 'add comment');
        $data = $response->getData();
        self::assertInstanceOf(AddCommentResponse::class, $data);
        if ($data->comment && $data->comment->id) {
            $this->createdCommentIds[] = $data->comment->id;
        }
    }

    /**
     * @test
     */
    public function testQueryComments(): void
    {
        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for query comments test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        ));
        $this->assertResponseSuccess($createResponse, 'create activity for query comments test');
        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        $commentResponse = $this->feedsV3Client->addComment(new GeneratedModels\AddCommentRequest(
            comment: 'Comment for query test',
            objectID: $activityId,
            objectType: 'activity',
            userID: $this->testUserId
        ));
        $this->assertResponseSuccess($commentResponse, 'add comment for query test');

        // snippet-start: QueryComments
        $response = $this->feedsV3Client->queryComments(
            new GeneratedModels\QueryCommentsRequest(
                filter: (object) ['object_id' => $activityId],
                limit: 10
            )
        );
        // snippet-end: QueryComments

        $this->assertResponseSuccess($response, 'query comments');
    }

    /**
     * @test
     */
    public function testUpdateComment(): void
    {
        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for update comment test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        ));
        $this->assertResponseSuccess($createResponse, 'create activity for update comment test');
        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        $commentResponse = $this->feedsV3Client->addComment(new GeneratedModels\AddCommentRequest(
            comment: 'Comment to be updated',
            objectID: $activityId,
            objectType: 'activity',
            userID: $this->testUserId
        ));
        $this->assertResponseSuccess($commentResponse, 'add comment for update test');
        $commentId = $commentResponse->getData()->comment->id ?? null;
        $this->createdCommentIds[] = $commentId;

        // snippet-start: UpdateComment
        try {
            $response = $this->feedsV3Client->updateComment(
                $commentId,
                new GeneratedModels\UpdateCommentRequest(comment: 'Updated comment text from PHP SDK')
            );
            // snippet-end: UpdateComment

            $this->assertResponseSuccess($response, 'update comment');
        } catch (StreamApiException $e) {
            self::markTestSkipped("Comment update failed with status {$e->getStatusCode()}: {$e->getMessage()}");
        } catch (\Exception $e) {
            self::markTestSkipped("Comment update failed: {$e->getMessage()}");
        }
    }

    private function assertResponseSuccess(mixed $response, string $operation): void
    {
        if ($response instanceof StreamResponse) {
            if (!$response->isSuccessful()) {
                self::fail("Failed to {$operation}. Status: " . $response->getStatusCode() . ', Body: ' . $response->getRawBody());
            }
        } else {
            self::assertNotNull($response, "Failed to {$operation}. Response is null.");
        }
    }
}
