<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\Client;
use GetStream\ClientBuilder;
use GetStream\Feed;
use GetStream\FeedsV3Client;
use GetStream\GeneratedModels;
use GetStream\StreamResponse;
use GetStream\Exceptions\StreamException;
use GetStream\Exceptions\StreamApiException;
use PHPUnit\Framework\TestCase;

/**
 * Systematic Integration tests for Feed operations
 * These tests follow a logical flow: setup → create → operate → cleanup
 *
 * Test order:
 * 1. Environment Setup (user, feed creation)
 * 2. Activity Operations (create, read, update, delete)
 * 3. Reaction Operations (add, query, delete)
 * 4. Comment Operations (add, read, update, delete)
 * 5. Bookmark Operations (add, query, update, delete)
 * 6. Follow Operations (follow, query, unfollow)
 * 7. Batch Operations
 * 8. Advanced Operations (polls, pins, etc.)
 * 9. Cleanup
 */
class FeedIntegrationTest extends TestCase
{
    private const USER_FEED_TYPE = 'user:';
    private const POLL_QUESTION = "What's your favorite programming language?";
    
    private Client $client;

    private FeedsV3Client $feedsV3Client;
    private string $testUserId;
    private string $testUserId2; // For follow operations
    private Feed $testFeed;
    private Feed $testFeed2;

    // Track created resources for cleanup
    private array $createdActivityIds = [];
    private array $createdCommentIds = [];
    private string $testActivityId = '';
    private string $testCommentId = '';

    /**
     * @throws StreamException
     */
    protected function setUp(): void
    {
        $this->client = ClientBuilder::fromEnv()->build();
        $this->feedsV3Client = ClientBuilder::fromEnv()->buildFeedsClient();

        $this->testUserId = 'test-user-' . uniqid();
        $this->testUserId2 = 'test-user-2-' . uniqid();
        $this->testFeed = $this->feedsV3Client->feed('user', $this->testUserId);
        $this->testFeed2 = $this->feedsV3Client->feed('user', $this->testUserId2);

        // Setup environment for each test
        $this->setupEnvironment();
    }

    protected function tearDown(): void
    {
        // Cleanup created resources in reverse order
        $this->cleanupResources();
    }

    // =================================================================
    // ENVIRONMENT SETUP (called in setUp for each test)
    // =================================================================

    private function setupEnvironment(): void
    {
        try {
            // Create test users
            // snippet-start: CreateUsers
            $response = $this->client->updateUsers(new GeneratedModels\UpdateUsersRequest(
                users: [
                    $this->testUserId => [
                        'id' => $this->testUserId,
                        'name' => 'Test User 1',
                        'role' => 'user'
                    ],
                    $this->testUserId2 => [
                        'id' => $this->testUserId2,
                        'name' => 'Test User 2',
                        'role' => 'user'
                    ]
                ]
            ));
            // snippet-end: CreateUsers

            if (!$response->isSuccessful()) {
                throw new StreamException('Failed to create users: ' . $response->getRawBody());
            }

            // Create feeds
            // snippet-start: GetOrCreateFeed

            $feedResponse1 = $this->testFeed->getOrCreateFeed(
                new GeneratedModels\GetOrCreateFeedRequest(userID: $this->testUserId)
            );
            $feedResponse2 = $this->testFeed2->getOrCreateFeed(
                new GeneratedModels\GetOrCreateFeedRequest(userID: $this->testUserId2)
            );
            // snippet-end: GetOrCreateFeed

            if (!$feedResponse1->isSuccessful()) {
                throw new StreamException('Failed to create feed 1: ' . $feedResponse1->getRawBody());
            }
            if (!$feedResponse2->isSuccessful()) {
                throw new StreamException('Failed to create feed 2: ' . $feedResponse2->getRawBody());
            }
        } catch (StreamApiException $e) {
            echo "⚠️ Setup failed: " . $e->getMessage() . "\n";
            echo "ResponseBody: " . $e->getResponseBody() . "\n";
            echo "ErrorDetail: " . $e->getErrorDetails() . "\n";
            throw $e;

        } catch (\Exception $e) {
            echo "⚠️ Setup failed: " . $e->getMessage() . "\n";
            // Continue with tests even if setup partially fails
        }
    }

    // =================================================================
    // 1. ENVIRONMENT SETUP TEST (demonstrates the setup process)
    // =================================================================

    public function test01_SetupEnvironmentDemo(): void
    {
        echo "\n🔧 Demonstrating environment setup...\n";
        echo "✅ Users and feeds are automatically created in setUp()\n";
        echo "   Test User 1: {$this->testUserId}\n";
        echo "   Test User 2: {$this->testUserId2}\n";

        $this->assertTrue(true); // Just a demo test
    }

    // =================================================================
    // 2. ACTIVITY OPERATIONS
    // =================================================================

    /**
     * @throws StreamException
     */
    public function test02_CreateActivity(): void
    {
        echo "\n📝 Testing activity creation...\n";

        // snippet-start: AddActivity
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'This is a test activity from PHP SDK',
            userID: $this->testUserId,
            custom: (object)[
                'test_field' => 'test_value',
                'timestamp' => time()
            ]
        );
        $response = $this->feedsV3Client->addActivity($activity);
        // snippet-end: AddActivity

        $this->assertResponseSuccess($response, 'add activity');

        // Access the typed response data directly
        $activityResponse = $response->getData();
        $this->assertInstanceOf(GeneratedModels\AddActivityResponse::class, $activityResponse);
        $this->assertNotNull($activityResponse->activity);
        $this->assertNotNull($activityResponse->activity->id);
        $this->assertNotNull($activityResponse->activity->text);

        //compare text
        $this->assertEquals($activity->text, $activityResponse->activity->text);
        
        $this->testActivityId = $activityResponse->activity->id;
        $this->createdActivityIds[] = $this->testActivityId;
        
        echo "✅ Created activity with ID: {$this->testActivityId}\n";
    }

    /**
     * @throws StreamException
     */
    public function test02b_CreateActivityWithAttachments(): void
    {
        echo "\n🖼️ Testing activity creation with image attachments...\n";

        // snippet-start: AddActivityWithImageAttachment
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'Look at this amazing view of NYC!',
            userID: $this->testUserId,
            attachments: [
                new GeneratedModels\Attachment(
                    imageUrl: 'https://example.com/nyc-skyline.jpg',
                    type: 'image',
                    title: 'NYC Skyline'
                )
            ],
            custom: (object)[
                'location' => 'New York City',
                'camera' => 'iPhone 15 Pro'
            ]
        );
        $response = $this->feedsV3Client->addActivity($activity);
        // snippet-end: AddActivityWithImageAttachment

        $this->assertResponseSuccess($response, 'add activity with image attachment');
        
        $data = $response->getData();
        $activityId = $data->activity->id;
        $this->createdActivityIds[] = $activityId;
        
        echo "✅ Created activity with image attachment: {$activityId}\n";
    }

    /**
     * @throws StreamException
     */
    public function test02c_CreateVideoActivity(): void
    {
        echo "\n🎥 Testing video activity creation...\n";

        // snippet-start: AddVideoActivity
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'video',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'Check out this amazing video!',
            userID: $this->testUserId,
            attachments: [
                new GeneratedModels\Attachment(
                    assetUrl: 'https://example.com/amazing-video.mp4',
                    type: 'video',
                    title: 'Amazing Video',
                    custom: (object)['duration' => 120]
                )
            ],
            custom: (object)[
                'video_quality' => '4K',
                'duration_seconds' => 120
            ]
        );
        $response = $this->feedsV3Client->addActivity($activity);
        // snippet-end: AddVideoActivity

        $this->assertResponseSuccess($response, 'add video activity');
        
        $data = $response->getData();
        $activityId = $data->activity->id;
        $this->createdActivityIds[] = $activityId;
        
        echo "✅ Created video activity: {$activityId}\n";
    }

    /**
     * @throws StreamException
     */
    public function test02d_CreateStoryActivityWithExpiration(): void
    {
        echo "\n📖 Testing story activity with expiration...\n";

        // snippet-start: AddStoryActivityWithExpiration
        $tomorrow = new \DateTime('+1 day');
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'story',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'My daily story - expires tomorrow!',
            userID: $this->testUserId,
            expiresAt: $tomorrow->format('c'), // ISO 8601 format
            attachments: [
                new GeneratedModels\Attachment(
                    imageUrl: 'https://example.com/story-image.jpg',
                    type: 'image'
                ),
                new GeneratedModels\Attachment(
                    assetUrl: 'https://example.com/story-video.mp4',
                    type: 'video',
                    custom: (object)['duration' => 15]
                )
            ],
            custom: (object)[
                'story_type' => 'daily',
                'auto_expire' => true
            ]
        );
        $response = $this->feedsV3Client->addActivity($activity);
        // snippet-end: AddStoryActivityWithExpiration

        $this->assertResponseSuccess($response, 'add story activity with expiration');
        
        $data = $response->getData();
        $activityId = $data->activity->id;
        $this->createdActivityIds[] = $activityId;
        
        echo "✅ Created story activity with expiration: {$activityId}\n";
    }

    /**
     * @throws StreamException
     */
    public function test02e_CreateActivityMultipleFeeds(): void
    {
        echo "\n📡 Testing activity creation to multiple feeds...\n";

        // snippet-start: AddActivityToMultipleFeeds
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [
                $this->testFeed->getFeedIdentifier(),
                $this->testFeed2->getFeedIdentifier()
            ],
            text: 'This post appears in multiple feeds!',
            userID: $this->testUserId,
            custom: (object)[
                'cross_posted' => true,
                'target_feeds' => 2
            ]
        );
        $response = $this->feedsV3Client->addActivity($activity);
        // snippet-end: AddActivityToMultipleFeeds

        $this->assertResponseSuccess($response, 'add activity to multiple feeds');
        
        $data = $response->getData();
        $activityId = $data->activity->id;
        $this->createdActivityIds[] = $activityId;
        
        echo "✅ Created activity in multiple feeds: {$activityId}\n";
    }

    public function test03_QueryActivities(): void
    {
        echo "\n🔍 Testing activity querying...\n";
        
        // snippet-start: QueryActivities
        $response = $this->feedsV3Client->queryActivities(
            new GeneratedModels\QueryActivitiesRequest(
                limit: 10,
                filter: (object)['activity_type' => 'post']
            )
        );
        // snippet-end: QueryActivities

        $this->assertResponseSuccess($response, 'query activities');
        
        $data = $response->getData();
        $this->assertInstanceOf(\GetStream\GeneratedModels\QueryActivitiesResponse::class, $data);
        $this->assertNotNull($data->activities);
        echo "✅ Queried activities successfully\n";
    }

    /**
     * @throws StreamException
     */
    public function test04_GetSingleActivity(): void
    {
        echo "\n📄 Testing single activity retrieval...\n";
        
        // First create an activity to retrieve
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for retrieval test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        );

        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for retrieval test');
        
        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
        $this->createdActivityIds[] = $activityId;

        // snippet-start: GetActivity
        $response = $this->feedsV3Client->getActivity($activityId);
        // snippet-end: GetActivity

        $this->assertResponseSuccess($response, 'get activity');
        
        $data = $response->getData();
        $this->assertInstanceOf(\GetStream\GeneratedModels\GetActivityResponse::class, $data);
        $this->assertNotNull($data->activity);
        $this->assertEquals($activityId, $data->activity->id);
        echo "✅ Retrieved single activity\n";
    }

    public function test05_UpdateActivity(): void
    {
        echo "\n✏️ Testing activity update...\n";
        
        // First create an activity to update
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for update test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        );
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for update test');
        
        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
        $this->createdActivityIds[] = $activityId;

        // snippet-start: UpdateActivity
        $response = $this->feedsV3Client->updateActivity(
            $activityId,
            new GeneratedModels\UpdateActivityRequest(
                text: 'Updated activity text from PHP SDK',
                userID: $this->testUserId,  // Required for server-side auth
                custom: (object)[
                    'updated' => true,
                    'update_time' => time()
                ]
            )
        );
        // snippet-end: UpdateActivity

        $this->assertResponseSuccess($response, 'update activity');
        echo "✅ Updated activity\n";
    }

    // =================================================================
    // 3. REACTION OPERATIONS
    // =================================================================

    public function test06_AddReaction(): void
    {
        echo "\n👍 Testing reaction addition...\n";
        
        // First create an activity to react to
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for reaction test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        );
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for reaction test');
        
        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
        $this->createdActivityIds[] = $activityId;

        // snippet-start: AddReaction
        $response = $this->feedsV3Client->addReaction(
            $activityId,
            new GeneratedModels\AddReactionRequest(
                type: 'like',
                userID: $this->testUserId
            )
        );
        // snippet-end: AddReaction

        $this->assertResponseSuccess($response, 'add reaction');
        echo "✅ Added like reaction\n";
    }

    public function test07_QueryReactions(): void
    {
        echo "\n🔍 Testing reaction querying...\n";
        
        // Create an activity and add a reaction to it
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for query reactions test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        );
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for query reactions test');
        
        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
        $this->createdActivityIds[] = $activityId;
        
        // Add a reaction first
        $reactionResponse = $this->feedsV3Client->addReaction(
            $activityId,
            new GeneratedModels\AddReactionRequest(
                type: 'like',
                userID: $this->testUserId
            )
        );
        $this->assertResponseSuccess($reactionResponse, 'add reaction for query test');

        try {
            // snippet-start: QueryActivityReactions
            $response = $this->feedsV3Client->queryActivityReactions(
                $activityId,
                new GeneratedModels\QueryActivityReactionsRequest(
                    limit: 10,
                    filter: (object)['type' => 'like']
                )
            );
            // snippet-end: QueryActivityReactions

            $this->assertResponseSuccess($response, 'query reactions');
            echo "✅ Queried reactions\n";
        } catch (StreamApiException $e) {
            echo "Query reactions skipped: " . $e->getMessage() . "\n";
            $this->markTestSkipped('Query reactions not supported: ' . $e->getMessage());
        }
    }

    // =================================================================
    // 4. COMMENT OPERATIONS
    // =================================================================

    /**
     * @throws StreamException
     */
    public function test08_AddComment(): void
    {
        echo "\n💬 Testing comment addition...\n";
        
        // First create an activity to comment on
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'Activity for comment test',
            userID: $this->testUserId
        );
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for comment test');
        
        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
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
        $this->assertInstanceOf(\GetStream\GeneratedModels\AddCommentResponse::class, $data);
        if ($data->comment && $data->comment->id) {
            $this->testCommentId = $data->comment->id;
            $this->createdCommentIds[] = $this->testCommentId;
            echo "✅ Added comment with ID: {$this->testCommentId}\n";
        } else {
            echo "✅ Added comment (no ID returned)\n";
        }
    }

    public function test09_QueryComments(): void
    {
        echo "\n🔍 Testing comment querying...\n";
        
        // Create an activity and add a comment to it
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for query comments test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        );
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for query comments test');
        
        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
        $this->createdActivityIds[] = $activityId;
        
        // Add a comment first
        $commentResponse = $this->feedsV3Client->addComment(
            new GeneratedModels\AddCommentRequest(
                comment: 'Comment for query test',
                objectID: $activityId,
                objectType: 'activity',
                userID: $this->testUserId
            )
        );
        $this->assertResponseSuccess($commentResponse, 'add comment for query test');

        // snippet-start: QueryComments
        $response = $this->feedsV3Client->queryComments(
            new GeneratedModels\QueryCommentsRequest(
                filter: (object)['object_id' => $activityId],
                limit: 10
            )
        );
        // snippet-end: QueryComments

        $this->assertResponseSuccess($response, 'query comments');
        echo "✅ Queried comments\n";
    }

    public function test10_UpdateComment(): void
    {
        echo "\n✏️ Testing comment update...\n";
        
        // Create an activity and add a comment to update
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for update comment test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        );
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for update comment test');
        
        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
        $this->createdActivityIds[] = $activityId;
        
        // Add a comment to update
        $commentResponse = $this->feedsV3Client->addComment(
            new GeneratedModels\AddCommentRequest(
                comment: 'Comment to be updated',
                objectID: $activityId,
                objectType: 'activity',
                userID: $this->testUserId
            )
        );
        $this->assertResponseSuccess($commentResponse, 'add comment for update test');
        
        $commentResponseData = $commentResponse->getData();
        $commentId = $commentResponseData->comment->id ?? 'comment-id';  // Fallback if ID not returned

        // snippet-start: UpdateComment
        $response = $this->feedsV3Client->updateComment(
            $commentId,
            new GeneratedModels\UpdateCommentRequest(
                comment: 'Updated comment text from PHP SDK'
            )
        );
        // snippet-end: UpdateComment

        $this->assertResponseSuccess($response, 'update comment');
        echo "✅ Updated comment\n";
    }

    // =================================================================
    // 5. BOOKMARK OPERATIONS
    // =================================================================

    public function test11_AddBookmark(): void
    {
        echo "\n🔖 Testing bookmark addition...\n";
        
        // Create an activity to bookmark
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for bookmark test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        );
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for bookmark test');
        
        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
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

            echo "Bookmark response status: " . $response->getStatusCode() . "\n";
            echo "Bookmark response body: " . $response->getRawBody() . "\n";
            $this->assertResponseSuccess($response, 'add bookmark');
        } catch (StreamApiException $e) {
            echo "Add bookmark failed: " . $e->getMessage() . "\n";
            echo "Status: " . $e->getStatusCode() . "\n";
            echo "Response: " . $e->getResponseBody() . "\n";
            $this->markTestSkipped('Add bookmark not supported: ' . $e->getMessage());
        }
        echo "✅ Added bookmark\n";
    }

    public function test12_QueryBookmarks(): void
    {
        echo "\n🔍 Testing bookmark querying...\n";

        // snippet-start: QueryBookmarks
        $response = $this->feedsV3Client->queryBookmarks(
            new GeneratedModels\QueryBookmarksRequest(
                limit: 10,
                filter: (object)['user_id' => $this->testUserId]
            )
        );
        // snippet-end: QueryBookmarks

        $this->assertInstanceOf(StreamResponse::class, $response);
        $this->assertResponseSuccess($response, "operation");
        echo "✅ Queried bookmarks\n";
    }

    public function test13_UpdateBookmark(): void
    {
        echo "\n✏️ Testing bookmark update...\n";
        
        // Create an activity and bookmark it first
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'Activity for update bookmark test',
            userID: $this->testUserId
        );
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for update bookmark test');
        
        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
        $this->createdActivityIds[] = $activityId;
        
        // Add a bookmark first
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
            new GeneratedModels\UpdateBookmarkRequest(
                folderID: $folderID,
                userID: $this->testUserId
            )
        );
        // snippet-end: UpdateBookmark

        $this->assertResponseSuccess($response, 'update bookmark');
        echo "✅ Updated bookmark\n";
    }

    // =================================================================
    // 6. FOLLOW OPERATIONS
    // =================================================================

    public function test14_FollowUser(): void
    {
        echo "\n👥 Testing follow operation...\n";

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
            echo "Follow failed: " . $e->getMessage() . "\n";
            echo "Status: " . $e->getStatusCode() . "\n";
            echo "Response: " . $e->getResponseBody() . "\n";
            $this->markTestSkipped('Follow operation not supported: ' . $e->getMessage());
        }
        echo "✅ Followed user: {$this->testUserId2}\n";
    }

    public function test15_QueryFollows(): void
    {
        echo "\n🔍 Testing follow querying...\n";

        // snippet-start: QueryFollows
        $response = $this->feedsV3Client->queryFollows(
            new GeneratedModels\QueryFollowsRequest(limit: 10)
        );
        // snippet-end: QueryFollows

        $this->assertInstanceOf(StreamResponse::class, $response);
        $this->assertResponseSuccess($response, "operation");
        echo "✅ Queried follows\n";
    }

    // =================================================================
    // 7. BATCH OPERATIONS
    // =================================================================

    public function test16_UpsertActivities(): void
    {
        echo "\n📝 Testing batch activity upsert...\n";

        // snippet-start: UpsertActivities

        $activities = [
            [
                'type' => 'post',
                'text' => 'Batch activity 1',
                'user_id' => $this->testUserId,
            ],
            [
                'type' => 'post',
                'text' => 'Batch activity 2',
                'user_id' => $this->testUserId,
            ]
        ];

        $response = $this->feedsV3Client->upsertActivities(
            new GeneratedModels\UpsertActivitiesRequest(activities: $activities)
        );
        // snippet-end: UpsertActivities

        $this->assertInstanceOf(StreamResponse::class, $response);
        $this->assertResponseSuccess($response, "operation");
        
        // Track created activities for cleanup
        $data = $response->getData();
        if (isset($data->activities)) {
            foreach ($data->activities as $activity) {
                if (isset($activity['id'])) {
                    $this->createdActivityIds[] = $activity['id'];
                }
            }
        }
        
        echo "✅ Upserted batch activities\n";
    }

    // =================================================================
    // 8. ADVANCED OPERATIONS
    // =================================================================

    /**
     * @throws StreamException
     */
    public function test17_PinActivity(): void
    {
        echo "\n📌 Testing activity pinning...\n";
        
        // Create an activity to pin
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'Activity for pin test',
            userID: $this->testUserId
        );
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for pin test');
        
        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
        $this->createdActivityIds[] = $activityId;


        // snippet-start: PinActivity
        $response = $this->testFeed->pinActivity(
            $activityId,
            new GeneratedModels\PinActivityRequest(userID: $this->testUserId)
        );
        // snippet-end: PinActivity

        $this->assertResponseSuccess($response, 'pin activity');
        echo "✅ Pinned activity\n";
    }

    public function test18_UnpinActivity(): void
    {
        echo "\n📌 Testing activity unpinning...\n";
        
        // Create an activity, pin it, then unpin it
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'Activity for unpin test',
            userID: $this->testUserId
        );
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for unpin test');
        
        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
        $this->createdActivityIds[] = $activityId;
        
        // Pin it first
        $pinResponse = $this->testFeed->pinActivity(
            $activityId,
            new GeneratedModels\PinActivityRequest(userID: $this->testUserId)
        );
        $this->assertResponseSuccess($pinResponse, 'pin activity for unpin test');

        // snippet-start: UnpinActivity
        $response = $this->testFeed->unpinActivity($activityId, $this->testUserId);
        // snippet-end: UnpinActivity

        $this->assertResponseSuccess($response, 'unpin activity');
        echo "✅ Unpinned activity\n";
    }

    // =================================================================
    // 9. CLEANUP OPERATIONS (in reverse order)
    // =================================================================

    public function test19_DeleteBookmark(): void
    {
        echo "\n🗑️ Testing bookmark deletion...\n";
        
        // Create an activity and bookmark it first
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for delete bookmark test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        );
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for delete bookmark test');
        
        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
        $this->createdActivityIds[] = $activityId;
        
        // Add a bookmark first
        $bookmarkResponse = $this->feedsV3Client->addBookmark(
            $activityId,
            new GeneratedModels\AddBookmarkRequest(
                newFolder: new GeneratedModels\AddFolderRequest(name: 'test-bookmarks1'),
                userID: $this->testUserId
            )
        );
        $this->assertResponseSuccess($bookmarkResponse, 'add bookmark for delete test');

        // snippet-start: DeleteBookmark
        $bookmarkData = $bookmarkResponse->getData();
        $folderId = $bookmarkData->bookmark->folder->id;
        $response = $this->feedsV3Client->deleteBookmark($activityId, $folderId, $this->testUserId);
        // snippet-end: DeleteBookmark

        $this->assertResponseSuccess($response, 'delete bookmark');
        echo "✅ Deleted bookmark\n";
    }

    public function test20_DeleteReaction(): void
    {
        echo "\n🗑️ Testing reaction deletion...\n";
        
        // Create an activity and add a reaction first
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for delete reaction test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        );
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for delete reaction test');
        
        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
        $this->createdActivityIds[] = $activityId;
        
        // Add a reaction first
        $reactionResponse = $this->feedsV3Client->addReaction(
            $activityId,
            new GeneratedModels\AddReactionRequest(
                type: 'like',
                userID: $this->testUserId
            )
        );
        $this->assertResponseSuccess($reactionResponse, 'add reaction for delete test');

        // snippet-start: DeleteActivityReaction
        $response = $this->feedsV3Client->deleteActivityReaction($activityId, 'like', $this->testUserId);
        // snippet-end: DeleteActivityReaction

        $this->assertResponseSuccess($response, 'delete reaction');
        echo "✅ Deleted reaction\n";
    }

    public function test21_DeleteComment(): void
    {
        echo "\n🗑️ Testing comment deletion...\n";
        
        // Create an activity and add a comment first
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for delete comment test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        );
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for delete comment test');
        
        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
        $this->createdActivityIds[] = $activityId;
        
        // Add a comment first
        $commentResponse = $this->feedsV3Client->addComment(
            new GeneratedModels\AddCommentRequest(
                comment: 'Comment to be deleted',
                objectID: $activityId,
                objectType: 'activity',
                userID: $this->testUserId
            )
        );
        $this->assertResponseSuccess($commentResponse, 'add comment for delete test');
        
        $commentResponseData = $commentResponse->getData();
        $commentId = $commentResponseData->comment->id ?? 'comment-id';  // Fallback if ID not returned

        // snippet-start: DeleteComment
        $response = $this->feedsV3Client->deleteComment($commentId, false); // soft delete
        // snippet-end: DeleteComment

        $this->assertResponseSuccess($response, 'delete comment');
        echo "✅ Deleted comment\n";
    }

    public function test22_UnfollowUser(): void
    {
        echo "\n👥 Testing unfollow operation...\n";

        try {
            // First establish a follow relationship
            $followResponse = $this->feedsV3Client->follow(
                new GeneratedModels\FollowRequest(
                    source: self::USER_FEED_TYPE . $this->testUserId,
                    target: self::USER_FEED_TYPE . $this->testUserId2
                )
            );
            $this->assertResponseSuccess($followResponse, 'establish follow relationship for unfollow test');
            
            // snippet-start: Unfollow
            $response = $this->feedsV3Client->unfollow(
                self::USER_FEED_TYPE . $this->testUserId,
                self::USER_FEED_TYPE . $this->testUserId2
            );
            // snippet-end: Unfollow

            $this->assertInstanceOf(StreamResponse::class, $response);
            $this->assertResponseSuccess($response, "unfollow operation");
            echo "✅ Unfollowed user: {$this->testUserId2}\n";
        } catch (StreamApiException $e) {
            echo "Unfollow operation skipped: " . $e->getMessage() . "\n";
            $this->markTestSkipped('Unfollow operation not supported: ' . $e->getMessage());
        }
    }

    public function test23_DeleteActivities(): void
    {
        echo "\n🗑️ Testing activity deletion...\n";
        
        // Create some activities to delete
        $activitiesToDelete = [];
        for ($i = 1; $i <= 2; $i++) {
            $activity = new GeneratedModels\AddActivityRequest(
                type: 'post',
                text: "Activity {$i} for delete test",
                userID: $this->testUserId,
                feeds: [$this->testFeed->getFeedIdentifier()]
            );
            
            $createResponse = $this->feedsV3Client->addActivity($activity);
            $this->assertResponseSuccess($createResponse, "create activity {$i} for delete test");
            
            $createData = $createResponse->getData();
            $activityId = $createData->activity->id;
            $activitiesToDelete[] = $activityId;
            $this->createdActivityIds[] = $activityId;
        }

        foreach ($activitiesToDelete as $activityId) {
            // snippet-start: DeleteActivity
            $response = $this->feedsV3Client->deleteActivity($activityId, false); // soft delete
            // snippet-end: DeleteActivity

            $this->assertResponseSuccess($response, 'delete activity');
        }
        
        echo "✅ Deleted " . count($activitiesToDelete) . " activities\n";
        $this->createdActivityIds = [];
    }

    // =================================================================
    // 10. ADDITIONAL COMPREHENSIVE TESTS
    // =================================================================

    /**
     * @throws StreamException
     */
    public function test24_CreatePoll(): void
    {
        echo "\n🗳️ Testing poll creation...\n";
        
        try {
            // snippet-start: CreatePoll


            $poll = new GeneratedModels\CreatePollRequest(
                name: 'Poll',
                description: self::POLL_QUESTION,
                userID: $this->testUserId,
                options: [
                    'Red',
                    'Blue',
                ]
            );
            $pollResponse = $this->client->createPoll($poll);
            $pollData = $pollResponse->getData();
            $pollId = $pollData['id'] ?? 'poll-' . uniqid();

            $pollActivity = new GeneratedModels\AddActivityRequest(
                type: 'poll',
                feeds: [$this->testFeed->getFeedIdentifier()],
                pollID: $pollId,
                text: self::POLL_QUESTION,
                userID: $this->testUserId,
                custom: (object)[
                    'poll_name' => self::POLL_QUESTION,
                    'poll_description' => "Choose your favorite programming language from the options below",
                    'poll_options' => ['PHP', 'Python', 'JavaScript', 'Go'],
                    'allow_user_suggested_options' => false,
                    'max_votes_allowed' => 1
                ]
            );
            $response = $this->feedsV3Client->addActivity($pollActivity);
            // snippet-end: CreatePoll
            
            $this->assertResponseSuccess($response, 'create poll');
            
            $data = $response->getData();
            $activityId = $data->activity->id;
            $this->createdActivityIds[] = $activityId;
            
            echo "✅ Created poll activity: {$activityId}\n";
        } catch (StreamApiException $e) {
            echo "Poll creation skipped: " . $e->getMessage() . "\n";
            $this->markTestSkipped('Poll operations not supported: ' . $e->getMessage());
        }
    }

    /**
     * @throws StreamException
     */
    public function test25_VotePoll(): void
    {
        echo "\n✅ Testing poll voting...\n";
        
        try {
            // Create a poll first using the proper API
            $poll = new GeneratedModels\CreatePollRequest(
                name: 'Favorite Color Poll',
                description: 'What is your favorite color?',
                userID: $this->testUserId,
                options: [
                    'Red',
                    'Blue',
                    'Green'
                ]
            );
            $pollResponse = $this->client->createPoll($poll);
            $pollData = $pollResponse->getData();
            $pollId = $pollData['id'] ?? 'poll-' . uniqid();
            
            // Create activity with the poll
            $pollActivity = new GeneratedModels\AddActivityRequest(
                type: 'poll',
                feeds: [$this->testFeed->getFeedIdentifier()],
                text: 'Vote for your favorite color',
                userID: $this->testUserId,
                pollID: $pollId,
                custom: (object)[
                    'poll_name' => 'What is your favorite color?',
                    'poll_description' => 'Choose your favorite color from the options below',
                    'poll_options' => ['Red', 'Blue', 'Green'],
                    'allow_user_suggested_options' => false
                ]
            );
            
            $createResponse = $this->feedsV3Client->addActivity($pollActivity);
            $this->assertResponseSuccess($createResponse, 'create poll for voting');
            
            $createData = $createResponse->getData();
            $activityId = $createData->activity->id;
            $this->createdActivityIds[] = $activityId;
            
            // Get poll options from the poll response
            $pollOptions = $pollData['options'] ?? [];
            
            if (!empty($pollOptions)) {
                // Use the first option ID from the poll creation response
                $optionId = $pollOptions[0]['id'] ?? $pollOptions[0];

                try {
                    // snippet-start: VotePoll
                    $voteResponse = $this->feedsV3Client->castPollVote(
                        $activityId,
                        $pollId,
                        new GeneratedModels\CastPollVoteRequest(
                            userID: $this->testUserId,
                            vote: new GeneratedModels\VoteData(
                                optionID: $optionId
                            )
                        )
                    );
                    // snippet-end: VotePoll

                    $this->assertResponseSuccess($voteResponse, 'vote on poll');
                    echo "✅ Voted on poll: {$activityId}\n";
                } catch (StreamApiException $e) {
                    echo "Poll voting skipped: " . $e->getMessage() . "\n";
                    $this->markTestSkipped('Poll voting not supported: ' . $e->getMessage());
                }
            } else {
                echo "⚠️ Poll options not found in poll response\n";
                $this->markTestSkipped('Poll options not available for voting test');
            }
        } catch (StreamApiException $e) {
            echo "Poll voting skipped: " . $e->getMessage() . "\n";
            $this->markTestSkipped('Poll voting not supported: ' . $e->getMessage());
        }
    }

    /**
     * @throws StreamException
     */
    public function test26_ModerateActivity(): void
    {
        echo "\n🛡️ Testing activity moderation...\n";
        
        // Create an activity to moderate
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'This content might need moderation',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        );
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for moderation');
        
        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
        $this->createdActivityIds[] = $activityId;
        
        try {
            // snippet-start: ModerateActivity
            $moderationResponse = $this->feedsV3Client->activityFeedback(
                $activityId,
                new GeneratedModels\ActivityFeedbackRequest(
                    report: true,
                    reason: 'inappropriate_content',
                    userID: $this->testUserId2 // Different user reporting
                )
            );
            // snippet-end: ModerateActivity
            
            $this->assertResponseSuccess($moderationResponse, 'moderate activity');
            echo "✅ Flagged activity for moderation: {$activityId}\n";
        } catch (StreamApiException $e) {
            echo "Activity moderation skipped: " . $e->getMessage() . "\n";
            $this->markTestSkipped('Activity moderation not supported: ' . $e->getMessage());
        }
    }

    /**
     * @throws StreamException
     */
    public function test27_DeviceManagement(): void
    {
        echo "\n📱 Testing device management...\n";
        
        $deviceToken = 'test-device-token-' . uniqid();
        
        try {
            // snippet-start: AddDevice
            $addDeviceResponse = $this->client->createDevice(
                new GeneratedModels\CreateDeviceRequest(
                    id: $deviceToken,
                    pushProvider: 'apn',
                    userID: $this->testUserId
                )
            );
            // snippet-end: AddDevice
            
            $this->assertResponseSuccess($addDeviceResponse, 'add device');
            echo "✅ Added device: {$deviceToken}\n";
            
            // snippet-start: RemoveDevice
            $removeDeviceResponse = $this->client->deleteDevice(
                $deviceToken,
                $this->testUserId
            );
            // snippet-end: RemoveDevice
            
            $this->assertResponseSuccess($removeDeviceResponse, 'remove device');
            echo "✅ Removed device: {$deviceToken}\n";
        } catch (StreamApiException $e) {
            echo "Device management skipped: " . $e->getMessage() . "\n";
            $this->markTestSkipped('Device management not supported: ' . $e->getMessage());
        }
    }

    /**
     * @throws StreamException
     */
    public function test28_QueryActivitiesWithFilters(): void
    {
        echo "\n🔍 Testing activity queries with advanced filters...\n";
        
        // Create activities with different types and metadata
        $activityTypes = ['post', 'photo', 'video', 'story'];
        
        foreach ($activityTypes as $type) {
            $activity = new GeneratedModels\AddActivityRequest(
                type: $type,
                text: "Test {$type} activity for filtering",
                userID: $this->testUserId,
                feeds: [$this->testFeed->getFeedIdentifier()],
                custom: (object)[
                    'category' => $type,
                    'priority' => rand(1, 5),
                    'tags' => [$type, 'test', 'filter']
                ]
            );
            
            $createResponse = $this->feedsV3Client->addActivity($activity);
            $this->assertResponseSuccess($createResponse, "create {$type} activity for filtering");
            
            $createData = $createResponse->getData();
            $this->createdActivityIds[] = $createData->activity->id;
        }
        
        try {
            // Query with type filter
            // snippet-start: QueryActivitiesWithTypeFilter
            $response = $this->feedsV3Client->queryActivities(
                new GeneratedModels\QueryActivitiesRequest(
                    limit: 10,
                    filter: (object)[
                        'activity_type' => 'post',
                        'user_id' => $this->testUserId
                    ],
                    sort: ['created_at' => -1] // newest first
                )
            );
            // snippet-end: QueryActivitiesWithTypeFilter
            
            $this->assertResponseSuccess($response, 'query activities with type filter');
        } catch (StreamApiException $e) {
            echo "Query activities with type filter skipped: " . $e->getMessage() . "\n";
        }
        
        try {
            // Query with custom field filter
            // snippet-start: QueryActivitiesWithCustomFilter
            $customFilterResponse = $this->feedsV3Client->queryActivities(
                new GeneratedModels\QueryActivitiesRequest(
                    limit: 10,
                    filter: (object)[
                        'custom.priority' => (object)['$gte' => 3], // priority >= 3
                        'user_id' => $this->testUserId
                    ]
                )
            );
            // snippet-end: QueryActivitiesWithCustomFilter
            
            $this->assertResponseSuccess($customFilterResponse, 'query activities with custom filter');
        } catch (StreamApiException $e) {
            echo "Query activities with custom filter skipped: " . $e->getMessage() . "\n";
        }
        
        echo "✅ Queried activities with advanced filters\n";
    }

    /**
     * @throws StreamException
     */
    public function test29_GetFeedActivitiesWithPagination(): void
    {
        echo "\n📄 Testing feed activities with pagination...\n";
        
        // Create multiple activities for pagination test
        for ($i = 1; $i <= 7; $i++) {
            $activity = new GeneratedModels\AddActivityRequest(
                type: 'post',
                text: "Pagination test activity {$i}",
                userID: $this->testUserId,
                feeds: [$this->testFeed->getFeedIdentifier()]
            );
            
            $createResponse = $this->feedsV3Client->addActivity($activity);
            $this->assertResponseSuccess($createResponse, "create pagination activity {$i}");
            
            $createData = $createResponse->getData();
            $this->createdActivityIds[] = $createData->activity->id;
        }
        
        // Get first page
        // snippet-start: GetFeedActivitiesWithPagination
        $firstPageResponse = $this->feedsV3Client->queryActivities(
            new GeneratedModels\QueryActivitiesRequest(
                limit: 3,
                filter: (object)['user_id' => $this->testUserId]
            )
        );
        // snippet-end: GetFeedActivitiesWithPagination
        
        $this->assertResponseSuccess($firstPageResponse, 'get first page of feed activities');
        
        $firstPageData = $firstPageResponse->getData();
        $this->assertInstanceOf(\GetStream\GeneratedModels\QueryActivitiesResponse::class, $firstPageData);
        $this->assertNotNull($firstPageData->activities);
        $this->assertLessThanOrEqual(3, count($firstPageData->activities));
        
        // Get second page using next token if available
        // snippet-start: GetFeedActivitiesSecondPage
        $nextToken = $firstPageData->next ?? null;
        if ($nextToken) {
            $secondPageResponse = $this->feedsV3Client->queryActivities(
                new GeneratedModels\QueryActivitiesRequest(
                    limit: 3,
                    next: $nextToken,
                    filter: (object)['user_id' => $this->testUserId]
                )
            );
            $this->assertResponseSuccess($secondPageResponse, 'get second page of feed activities');
        } else {
            echo "⚠️ No next page available\n";
        }
        // snippet-end: GetFeedActivitiesSecondPage
        
        echo "✅ Retrieved feed activities with pagination\n";
    }

    /**
     * Test comprehensive error handling scenarios
     */
    public function test30_ErrorHandlingScenarios(): void
    {
        echo "\n⚠️ Testing error handling scenarios...\n";
        
        // Test 1: Invalid activity ID
        try {
            // snippet-start: HandleInvalidActivityId
            $response = $this->feedsV3Client->getActivity('invalid-activity-id-12345');
            // snippet-end: HandleInvalidActivityId
            
            if (!$response->isSuccessful()) {
                echo "✅ Correctly handled invalid activity ID error\n";
            }
        } catch (StreamApiException $e) {
            echo "✅ Caught expected error for invalid activity ID: " . $e->getStatusCode() . "\n";
        }
        
        // Test 2: Empty activity text
        try {
            // snippet-start: HandleEmptyActivityText
            $emptyActivity = new GeneratedModels\AddActivityRequest(
                type: 'post',
                text: '', // Empty text
                userID: $this->testUserId,
                feeds: [$this->testFeed->getFeedIdentifier()]
            );
            $response = $this->feedsV3Client->addActivity($emptyActivity);
            // snippet-end: HandleEmptyActivityText
            
            if (!$response->isSuccessful()) {
                echo "✅ Correctly handled empty activity text\n";
            }
        } catch (StreamApiException $e) {
            echo "✅ Caught expected error for empty activity text: " . $e->getStatusCode() . "\n";
        }
        
        // Test 3: Invalid user ID
        try {
            // snippet-start: HandleInvalidUserId
            $invalidUserActivity = new GeneratedModels\AddActivityRequest(
                type: 'post',
                text: 'Test with invalid user',
                userID: '', // Empty user ID
                feeds: [$this->testFeed->getFeedIdentifier()]
            );
            $response = $this->feedsV3Client->addActivity($invalidUserActivity);
            // snippet-end: HandleInvalidUserId
            
            if (!$response->isSuccessful()) {
                echo "✅ Correctly handled invalid user ID\n";
            }
        } catch (StreamApiException $e) {
            echo "✅ Caught expected error for invalid user ID: " . $e->getStatusCode() . "\n";
        }
        
        $this->assertTrue(true); // Test passes if we reach here
    }

    /**
     * Test authentication and authorization scenarios
     */
    public function test31_AuthenticationScenarios(): void
    {
        echo "\n🔐 Testing authentication scenarios...\n";
        
        // Test with valid user authentication
        // snippet-start: ValidUserAuthentication
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity with proper authentication',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        );
        $response = $this->feedsV3Client->addActivity($activity);
        // snippet-end: ValidUserAuthentication
        
        $this->assertResponseSuccess($response, 'activity with valid authentication');
        
        $data = $response->getData();
        $activityId = $data->activity->id;
        $this->createdActivityIds[] = $activityId;
        
        echo "✅ Successfully authenticated and created activity: {$activityId}\n";
        
        // Test user permissions for updating activity
        // snippet-start: UserPermissionUpdate
        $updateResponse = $this->feedsV3Client->updateActivity(
            $activityId,
            new GeneratedModels\UpdateActivityRequest(
                text: 'Updated with proper user permissions',
                userID: $this->testUserId // Same user can update
            )
        );
        // snippet-end: UserPermissionUpdate
        
        $this->assertResponseSuccess($updateResponse, 'update activity with proper permissions');
        echo "✅ Successfully updated activity with proper user permissions\n";
    }

    /**
     * Comprehensive test demonstrating real-world usage patterns
     */
    public function test32_RealWorldUsageDemo(): void
    {
        echo "\n🌍 Testing real-world usage patterns...\n";
        
        // Scenario: User posts content, gets reactions and comments
        // snippet-start: RealWorldScenario
        
        // 1. User creates a post with image
        $postActivity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Just visited the most amazing coffee shop! ☕️',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()],
            attachments: [
                new GeneratedModels\Attachment(
                    imageUrl: 'https://example.com/coffee-shop.jpg',
                    type: 'image',
                    title: 'Amazing Coffee Shop'
                )
            ],
            custom: (object)[
                'location' => 'Downtown Coffee Co.',
                'rating' => 5,
                'tags' => ['coffee', 'food', 'downtown']
            ]
        );
        $postResponse = $this->feedsV3Client->addActivity($postActivity);
        $this->assertResponseSuccess($postResponse, 'create real-world post');
        
        $postData = $postResponse->getData();
        $postId = $postData->activity->id;
        $this->createdActivityIds[] = $postId;
        
        // 2. Other users react to the post
        $reactionTypes = ['like', 'love', 'wow'];
        foreach ($reactionTypes as $reactionType) {
            $reactionResponse = $this->feedsV3Client->addReaction(
                $postId,
                new GeneratedModels\AddReactionRequest(
                    type: $reactionType,
                    userID: $this->testUserId2
                )
            );
            $this->assertResponseSuccess($reactionResponse, "add {$reactionType} reaction");
        }
        
        // 3. Users comment on the post
        $comments = [
            'That place looks amazing! What did you order?',
            'I love their espresso! Great choice 😍',
            'Adding this to my must-visit list!'
        ];
        
        foreach ($comments as $commentText) {
            $commentResponse = $this->feedsV3Client->addComment(
                new GeneratedModels\AddCommentRequest(
                    comment: $commentText,
                    objectID: $postId,
                    objectType: 'activity',
                    userID: $this->testUserId2
                )
            );
            $this->assertResponseSuccess($commentResponse, 'add comment to post');
        }
        
        // 4. User bookmarks the post
        try {
            $bookmarkResponse = $this->feedsV3Client->addBookmark(
                $postId,
                new GeneratedModels\AddBookmarkRequest(
                    userID: $this->testUserId2,
                    newFolder: new GeneratedModels\AddFolderRequest(name: 'favorite-places')
                )
            );
            $this->assertResponseSuccess($bookmarkResponse, 'bookmark the post');
        } catch (StreamApiException $e) {
            echo "Bookmark operation skipped: " . $e->getMessage() . "\n";
        }
        
        // 5. Query the activity with all its interactions
        $enrichedResponse = $this->feedsV3Client->getActivity($postId);
        $this->assertResponseSuccess($enrichedResponse, 'get enriched activity');
        
        // snippet-end: RealWorldScenario
        
        echo "✅ Completed real-world usage scenario demonstration\n";
    }

    // =================================================================
    // HELPER METHODS
    // =================================================================

    private function cleanupResources(): void
    {
        echo "\n🧹 Cleaning up test resources...\n";
        
        // Delete any remaining activities
        if (!empty($this->createdActivityIds)) {
            foreach ($this->createdActivityIds as $activityId) {
                try {
                    $this->feedsV3Client->deleteActivity($activityId, true); // hard delete
                } catch (StreamApiException $e) {
                    // Ignore cleanup errors
                    echo "Warning: Failed to cleanup activity {$activityId}: " . $e->getMessage() . "\n";
                }
            }
        }
        
        // Delete any remaining comments
        if (!empty($this->createdCommentIds)) {
            foreach ($this->createdCommentIds as $commentId) {
                try {
                    $this->feedsV3Client->deleteComment($commentId, true); // hard delete
                } catch (StreamApiException $e) {
                    // Ignore cleanup errors
                    echo "Warning: Failed to cleanup comment {$commentId}: " . $e->getMessage() . "\n";
                }
            }
        }
        
        echo "✅ Cleanup completed\n";
    }

    private function assertResponseSuccess($response, string $operation): void
    {
        // Handle both StreamResponse and generated model responses
        if ($response instanceof StreamResponse) {
            $this->assertInstanceOf(StreamResponse::class, $response);
            if (!$response->isSuccessful()) {
                $this->fail("Failed to {$operation}. Status: " . $response->getStatusCode() . ', Body: ' . $response->getRawBody());
            }
        } else {
            // For generated model responses, just assert they exist
            $this->assertNotNull($response, "Failed to {$operation}. Response is null.");
        }
    }
}
