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
use GetStream\StreamResponse;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

/**
 * Integration tests for Feed bookmark, follow, and batch operations.
 */
#[Group('integration')]
class FeedBookmarkFollowIntegrationTest extends TestCase
{
    private const USER_FEED_TYPE = 'user:';

    private Client $client;
    private FeedsV3Client $feedsV3Client;
    private string $testUserId;
    private string $testUserId2;
    private Feed $testFeed;
    private Feed $testFeed2;

    private array $createdActivityIds = [];

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
                self::$sharedUserId => ['id' => self::$sharedUserId, 'name' => 'Test User ' . self::$sharedUserId, 'role' => 'user'],
                self::$sharedUserId2 => ['id' => self::$sharedUserId2, 'name' => 'Test User ' . self::$sharedUserId2, 'role' => 'user'],
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
        foreach ($this->createdActivityIds as $activityId) {
            try {
                $this->feedsV3Client->deleteActivity($activityId, true, false);
            } catch (\Exception $e) {
                // best-effort
            }
        }
        $this->createdActivityIds = [];
    }

    // =================================================================
    // BOOKMARK OPERATIONS
    // =================================================================

    /**
     * @test
     */
    public function testAddBookmark(): void
    {
        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for bookmark test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        ));
        $this->assertResponseSuccess($createResponse, 'create activity for bookmark test');
        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        try {
            // snippet-start: AddBookmark
            $response = $this->feedsV3Client->addBookmark(
                $activityId,
                new GeneratedModels\AddBookmarkRequest(
                    userID: $this->testUserId,
                    newFolder: new GeneratedModels\AddFolderRequest(name: 'test-bookmarks1')
                )
            );
            // snippet-end: AddBookmark

            $this->assertResponseSuccess($response, 'add bookmark');
        } catch (StreamApiException $e) {
            self::markTestSkipped('Add bookmark not supported: ' . $e->getMessage());
        }
    }

    /**
     * @test
     */
    public function testQueryBookmarks(): void
    {
        // snippet-start: QueryBookmarks
        $response = $this->feedsV3Client->queryBookmarks(
            new GeneratedModels\QueryBookmarksRequest(
                limit: 10,
                filter: (object) ['user_id' => $this->testUserId]
            )
        );
        // snippet-end: QueryBookmarks

        self::assertInstanceOf(StreamResponse::class, $response);
        $this->assertResponseSuccess($response, 'query bookmarks');
    }

    /**
     * @test
     */
    public function testUpdateBookmark(): void
    {
        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'Activity for update bookmark test',
            userID: $this->testUserId
        ));
        $this->assertResponseSuccess($createResponse, 'create activity for update bookmark test');
        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        $bookmarkResponse = $this->feedsV3Client->addBookmark(
            $activityId,
            new GeneratedModels\AddBookmarkRequest(
                newFolder: new GeneratedModels\AddFolderRequest(name: 'test-bookmarks1'),
                userID: $this->testUserId
            )
        );
        $this->assertResponseSuccess($bookmarkResponse, 'add bookmark for update test');

        // snippet-start: UpdateBookmark
        $bookmarkData = $bookmarkResponse->getData();
        $folderID = $bookmarkData->bookmark->folder->id;
        $response = $this->feedsV3Client->updateBookmark(
            $activityId,
            new GeneratedModels\UpdateBookmarkRequest(folderID: $folderID, userID: $this->testUserId)
        );
        // snippet-end: UpdateBookmark

        $this->assertResponseSuccess($response, 'update bookmark');
    }

    // =================================================================
    // FOLLOW OPERATIONS
    // =================================================================

    /**
     * @test
     */
    public function testFollowUser(): void
    {
        // Ensure clean state (shared users may already have a follow from a prior run)
        try {
            $this->feedsV3Client->unfollow(
                self::USER_FEED_TYPE . $this->testUserId,
                self::USER_FEED_TYPE . $this->testUserId2,
                false
            );
        } catch (StreamApiException $e) {
            // Ignore - may not exist yet
        }

        try {
            // snippet-start: Follow
            $response = $this->feedsV3Client->follow(
                new GeneratedModels\FollowRequest(
                    source: self::USER_FEED_TYPE . $this->testUserId,
                    target: self::USER_FEED_TYPE . $this->testUserId2
                )
            );
            // snippet-end: Follow

            $this->assertResponseSuccess($response, 'follow user');
        } catch (StreamApiException $e) {
            self::markTestSkipped('Follow operation not supported: ' . $e->getMessage());
        }
    }

    /**
     * @test
     */
    public function testQueryFollows(): void
    {
        // snippet-start: QueryFollows
        $response = $this->feedsV3Client->queryFollows(
            new GeneratedModels\QueryFollowsRequest(limit: 10)
        );
        // snippet-end: QueryFollows

        self::assertInstanceOf(StreamResponse::class, $response);
        $this->assertResponseSuccess($response, 'query follows');
    }

    /**
     * @throws StreamApiException
     *
     * @test
     */
    public function testGetOrCreateFeedWithActivitiesAndFollow(): void
    {
        // snippet-start: GetOrCreateFeed
        $feedResponse1 = $this->testFeed->getOrCreateFeed(
            new GeneratedModels\GetOrCreateFeedRequest(userID: $this->testUserId)
        );
        // snippet-end: GetOrCreateFeed

        $this->assertResponseSuccess($feedResponse1, 'get or create feed');
        $feedData1 = $feedResponse1->getData();
        self::assertInstanceOf(GeneratedModels\GetOrCreateFeedResponse::class, $feedData1);
        self::assertNotNull($feedData1->feed);

        $activityResponse1 = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'Activity from getOrCreateFeed test',
            userID: $this->testUserId
        ));
        $this->assertResponseSuccess($activityResponse1, 'add activity to feed 1');
        $this->createdActivityIds[] = $activityResponse1->getData()->activity->id;

        $feedResponse2 = $this->testFeed2->getOrCreateFeed(
            new GeneratedModels\GetOrCreateFeedRequest(userID: $this->testUserId2)
        );
        $this->assertResponseSuccess($feedResponse2, 'get or create feed 2');

        $activityResponse2 = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed2->getFeedIdentifier()],
            text: 'Activity from user 2 in getOrCreateFeed test',
            userID: $this->testUserId2
        ));
        $this->assertResponseSuccess($activityResponse2, 'add activity to feed 2');
        $activityId2 = $activityResponse2->getData()->activity->id;
        $this->createdActivityIds[] = $activityId2;

        try {
            $followResponse = $this->feedsV3Client->follow(new GeneratedModels\FollowRequest(
                source: self::USER_FEED_TYPE . $this->testUserId,
                target: self::USER_FEED_TYPE . $this->testUserId2
            ));
            $this->assertResponseSuccess($followResponse, 'follow user 2');
        } catch (StreamApiException $e) {
            if (!str_contains($e->getMessage(), 'already exists')) {
                throw $e;
            }
        }

        $verifyFeedResponse = $this->testFeed2->getOrCreateFeed(
            new GeneratedModels\GetOrCreateFeedRequest(userID: $this->testUserId2)
        );
        $this->assertResponseSuccess($verifyFeedResponse, 'verify feed 2 exists');
        $verifyFeedData = $verifyFeedResponse->getData();
        self::assertSame($feedResponse2->getData()->feed->id, $verifyFeedData->feed->id);
    }

    // =================================================================
    // BATCH OPERATIONS
    // =================================================================

    /**
     * @test
     */
    public function testUpsertActivities(): void
    {
        // snippet-start: UpsertActivities
        $activities = [
            ['type' => 'post', 'text' => 'Batch activity 1', 'user_id' => $this->testUserId, 'feeds' => [$this->testFeed->getFeedIdentifier()]],
            ['type' => 'post', 'text' => 'Batch activity 2', 'user_id' => $this->testUserId, 'feeds' => [$this->testFeed->getFeedIdentifier()]],
        ];
        $response = $this->feedsV3Client->upsertActivities(
            new GeneratedModels\UpsertActivitiesRequest(activities: $activities)
        );
        // snippet-end: UpsertActivities

        self::assertInstanceOf(StreamResponse::class, $response);
        $this->assertResponseSuccess($response, 'upsert activities');

        $data = $response->getData();
        if (isset($data->activities)) {
            foreach ($data->activities as $activity) {
                if ($activity->id !== null) {
                    $this->createdActivityIds[] = $activity->id;
                }
            }
        }
    }

    private function assertResponseSuccess(mixed $response, string $operation): void
    {
        if ($response instanceof StreamResponse) {
            self::assertTrue(
                $response->isSuccessful(),
                "Failed to {$operation}. Status: " . $response->getStatusCode() . ', Body: ' . $response->getRawBody()
            );
        } else {
            self::assertNotNull($response, "Failed to {$operation}. Response is null.");
        }
    }
}
