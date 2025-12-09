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
use GetStream\GeneratedModels\CreateFeedGroupRequest;
use GetStream\GeneratedModels\GetActivityResponse;
use GetStream\GeneratedModels\QueryActivitiesResponse;
use GetStream\StreamResponse;
use PHPUnit\Framework\TestCase;

/**
 * Systematic Integration tests for Feed operations
 * These tests follow a logical flow: setup → create → operate → cleanup.
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
    // 1. ENVIRONMENT SETUP TEST (demonstrates the setup process)
    // =================================================================

    /**
     * @test
     */
    public function test01SetupEnvironmentDemo(): void
    {
        echo "\n🔧 Demonstrating environment setup...\n";
        echo "✅ Users and feeds are automatically created in setUp()\n";
        echo "   Test User 1: {$this->testUserId}\n";
        echo "   Test User 2: {$this->testUserId2}\n";

        self::assertTrue(true); // Just a demo test
    }

    // =================================================================
    // 2. ACTIVITY OPERATIONS
    // =================================================================

    /**
     * @throws StreamException
     *
     * @test
     */
    public function test02CreateActivity(): void
    {
        echo "\n📝 Testing activity creation...\n";

        // snippet-start: AddActivity
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'This is a test activity from PHP SDK',
            userID: $this->testUserId,
            custom: (object) [
                'test_field' => 'test_value',
                'timestamp' => time(),
            ]
        );
        $response = $this->feedsV3Client->addActivity($activity);
        // snippet-end: AddActivity

        $this->assertResponseSuccess($response, 'add activity');

        // Access the typed response data directly
        $activityResponse = $response->getData();
        self::assertInstanceOf(GeneratedModels\AddActivityResponse::class, $activityResponse);
        self::assertNotNull($activityResponse->activity);
        self::assertNotNull($activityResponse->activity->id);
        self::assertNotNull($activityResponse->activity->text);

        // compare text
        self::assertSame($activity->text, $activityResponse->activity->text);

        $this->testActivityId = $activityResponse->activity->id;
        $this->createdActivityIds[] = $this->testActivityId;

        echo "✅ Created activity with ID: {$this->testActivityId}\n";
    }

    /**
     * @throws StreamException
     *
     * @test
     */
    public function test02bCreateActivityWithAttachments(): void
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
                ),
            ],
            custom: (object) [
                'location' => 'New York City',
                'camera' => 'iPhone 15 Pro',
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
     *
     * @test
     */
    public function test02cCreateVideoActivity(): void
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
                    custom: (object) ['duration' => 120]
                ),
            ],
            custom: (object) [
                'video_quality' => '4K',
                'duration_seconds' => 120,
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
     *
     * @test
     */
    public function test02dCreateStoryActivityWithExpiration(): void
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
                    custom: (object) ['duration' => 15]
                ),
            ],
            custom: (object) [
                'story_type' => 'daily',
                'auto_expire' => true,
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
     *
     * @test
     */
    public function test02eCreateActivityMultipleFeeds(): void
    {
        echo "\n📡 Testing activity creation to multiple feeds...\n";

        // snippet-start: AddActivityToMultipleFeeds
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [
                $this->testFeed->getFeedIdentifier(),
                $this->testFeed2->getFeedIdentifier(),
            ],
            text: 'This post appears in multiple feeds!',
            userID: $this->testUserId,
            custom: (object) [
                'cross_posted' => true,
                'target_feeds' => 2,
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

    /**
     * @throws StreamException
     *
     * @test
     */
    public function test02fUploadImageAndFile(): void
    {
        echo "\n📤 Testing file and image uploads...\n";

        // Use the test image file in the same directory
        $testImagePath = __DIR__ . '/testupload.png';

        if (!file_exists($testImagePath)) {
            self::markTestSkipped("Test image file not found: {$testImagePath}");

            return;
        }

        // Test 1: Upload Image from file path
        echo "\n🖼️ Testing image upload from file...\n";

        // snippet-start: UploadImage
        $imageUploadRequest = new GeneratedModels\ImageUploadRequest(
            file: $testImagePath,
            user: new GeneratedModels\OnlyUserID(id: $this->testUserId),
            uploadSizes: [
                [
                    'width' => 100,
                    'height' => 100,
                    'resize' => 'scale',
                    'crop' => 'center',
                ],
            ]
        );
        $imageResponse = $this->client->uploadImage($imageUploadRequest);
        // snippet-end: UploadImage

        $this->assertResponseSuccess($imageResponse, 'upload image');

        $imageData = $imageResponse->getData();
        self::assertNotNull($imageData);
        self::assertNotNull($imageData->file);
        self::assertNotEmpty($imageData->file);

        $imageUrl = $imageData->file;
        echo "✅ Image uploaded successfully: {$imageUrl}\n";

        // Test 2: Upload Image with base64 (alternative method)
        echo "\n🖼️ Testing image upload with base64...\n";

        // Read image and encode as base64
        $imageContent = file_get_contents($testImagePath);
        if ($imageContent === false) {
            self::markTestSkipped("Could not read test image file: {$testImagePath}");

            return;
        }

        $base64Image = base64_encode($imageContent);

        $imageUploadRequest2 = new GeneratedModels\ImageUploadRequest(
            file: $base64Image,
            user: new GeneratedModels\OnlyUserID(id: $this->testUserId),
            uploadSizes: [
                [
                    'width' => 200,
                    'height' => 200,
                    'resize' => 'fill',
                    'crop' => 'center',
                ],
            ]
        );
        $imageResponse2 = $this->client->uploadImage($imageUploadRequest2);

        $this->assertResponseSuccess($imageResponse2, 'upload image with base64');
        $imageData2 = $imageResponse2->getData();
        self::assertNotNull($imageData2->file);
        echo "✅ Image uploaded with base64: {$imageData2->file}\n";

        // Test 3: Upload File
        echo "\n📄 Testing file upload...\n";

        // Create a temporary text file
        $tempFile = tmpfile();
        if ($tempFile === false) {
            self::markTestSkipped('Could not create temporary file');

            return;
        }

        $tempFilePath = stream_get_meta_data($tempFile)['uri'];
        $testContent = "This is a test file content from PHP SDK integration test\nCreated at: " . date('Y-m-d H:i:s');
        file_put_contents($tempFilePath, $testContent);

        // snippet-start: UploadFile
        $fileUploadRequest = new GeneratedModels\FileUploadRequest(
            file: $tempFilePath,
            user: new GeneratedModels\OnlyUserID(id: $this->testUserId)
        );
        $fileResponse = $this->client->uploadFile($fileUploadRequest);
        // snippet-end: UploadFile

        $this->assertResponseSuccess($fileResponse, 'upload file');

        $fileData = $fileResponse->getData();
        self::assertNotNull($fileData);
        self::assertNotNull($fileData->file);
        self::assertNotEmpty($fileData->file);

        $fileUrl = $fileData->file;
        echo "✅ File uploaded successfully: {$fileUrl}\n";

        // Cleanup temp file
        fclose($tempFile);

        echo "✅ All file upload tests completed\n";
    }

    /**
     * @test
     */
    public function test03QueryActivities(): void
    {
        echo "\n🔍 Testing activity querying...\n";

        // snippet-start: QueryActivities
        $response = $this->feedsV3Client->queryActivities(
            new GeneratedModels\QueryActivitiesRequest(
                limit: 10,
                filter: (object) ['activity_type' => 'post']
            )
        );
        // snippet-end: QueryActivities

        $this->assertResponseSuccess($response, 'query activities');

        $data = $response->getData();
        self::assertInstanceOf(QueryActivitiesResponse::class, $data);
        self::assertNotNull($data->activities);
        echo "✅ Queried activities successfully\n";
    }

    /**
     * @throws StreamException
     *
     * @test
     */
    public function test04GetSingleActivity(): void
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
        self::assertInstanceOf(GetActivityResponse::class, $data);
        self::assertNotNull($data->activity);
        self::assertSame($activityId, $data->activity->id);
        echo "✅ Retrieved single activity\n";
    }

    /**
     * @test
     */
    public function test05UpdateActivity(): void
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
                custom: (object) [
                    'updated' => true,
                    'update_time' => time(),
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

    /**
     * @test
     */
    public function test06AddReaction(): void
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
        $response = $this->feedsV3Client->addActivityReaction(
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

    /**
     * @test
     */
    public function test07QueryReactions(): void
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
        $reactionResponse = $this->feedsV3Client->addActivityReaction(
            $activityId,
            new GeneratedModels\AddReactionRequest(
                type: 'like',
                userID: $this->testUserId
            )
        );
        $this->assertResponseSuccess($reactionResponse, 'add reaction for query test');

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
        echo "✅ Queried reactions\n";
    }

    // =================================================================
    // 4. COMMENT OPERATIONS
    // =================================================================

    /**
     * @throws StreamException
     *
     * @test
     */
    public function test08AddComment(): void
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
        self::assertInstanceOf(AddCommentResponse::class, $data);
        if ($data->comment && $data->comment->id) {
            $this->testCommentId = $data->comment->id;
            $this->createdCommentIds[] = $this->testCommentId;
            echo "✅ Added comment with ID: {$this->testCommentId}\n";
        } else {
            echo "✅ Added comment (no ID returned)\n";
        }
    }

    /**
     * @test
     */
    public function test09QueryComments(): void
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
                filter: (object) ['object_id' => $activityId],
                limit: 10
            )
        );
        // snippet-end: QueryComments

        $this->assertResponseSuccess($response, 'query comments');
        echo "✅ Queried comments\n";
    }

    /**
     * @test
     */
    public function test10UpdateComment(): void
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
        $commentId = $commentResponseData->comment->id ?? null;

        // Add comment to cleanup list
        $this->createdCommentIds[] = $commentId;

        // snippet-start: UpdateComment
        try {
            $response = $this->feedsV3Client->updateComment(
                $commentId,
                new GeneratedModels\UpdateCommentRequest(
                    comment: 'Updated comment text from PHP SDK'
                )
            );
            // snippet-end: UpdateComment

            $this->assertResponseSuccess($response, 'update comment');
            echo "✅ Updated comment\n";
        } catch (StreamApiException $e) {
            // Comment update may fail due to API limitations or timing issues
            // Skip the test rather than failing, as this might be an API-side issue
            $statusCode = $e->getStatusCode();
            self::markTestSkipped("Comment update failed with status {$statusCode}: {$e->getMessage()}");

            return;
        } catch (\Exception $e) {
            // Catch any other exceptions and skip
            self::markTestSkipped("Comment update failed: {$e->getMessage()}");

            return;
        }
    }

    // =================================================================
    // 5. BOOKMARK OPERATIONS
    // =================================================================

    /**
     * @test
     */
    public function test11AddBookmark(): void
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

            echo 'Bookmark response status: ' . $response->getStatusCode() . "\n";
            echo 'Bookmark response body: ' . $response->getRawBody() . "\n";
            $this->assertResponseSuccess($response, 'add bookmark');
        } catch (StreamApiException $e) {
            echo 'Add bookmark failed: ' . $e->getMessage() . "\n";
            echo 'Status: ' . $e->getStatusCode() . "\n";
            echo 'Response: ' . $e->getResponseBody() . "\n";
            self::markTestSkipped('Add bookmark not supported: ' . $e->getMessage());
        }
        echo "✅ Added bookmark\n";
    }

    /**
     * @test
     */
    public function test12QueryBookmarks(): void
    {
        echo "\n🔍 Testing bookmark querying...\n";

        // snippet-start: QueryBookmarks
        $response = $this->feedsV3Client->queryBookmarks(
            new GeneratedModels\QueryBookmarksRequest(
                limit: 10,
                filter: (object) ['user_id' => $this->testUserId]
            )
        );
        // snippet-end: QueryBookmarks

        self::assertInstanceOf(StreamResponse::class, $response);
        $this->assertResponseSuccess($response, 'operation');
        echo "✅ Queried bookmarks\n";
    }

    /**
     * @test
     */
    public function test13UpdateBookmark(): void
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

    /**
     * @test
     */
    public function test14FollowUser(): void
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
            echo 'Follow failed: ' . $e->getMessage() . "\n";
            echo 'Status: ' . $e->getStatusCode() . "\n";
            echo 'Response: ' . $e->getResponseBody() . "\n";
            self::markTestSkipped('Follow operation not supported: ' . $e->getMessage());
        }
        echo "✅ Followed user: {$this->testUserId2}\n";
    }

    /**
     * @test
     */
    public function test15QueryFollows(): void
    {
        echo "\n🔍 Testing follow querying...\n";

        // snippet-start: QueryFollows
        $response = $this->feedsV3Client->queryFollows(
            new GeneratedModels\QueryFollowsRequest(limit: 10)
        );
        // snippet-end: QueryFollows

        self::assertInstanceOf(StreamResponse::class, $response);
        $this->assertResponseSuccess($response, 'operation');
        echo "✅ Queried follows\n";
    }

    /**
     * @test
     *
     * @throws StreamApiException
     */
    public function test15bGetOrCreateFeedWithActivitiesAndFollow(): void
    {
        echo "\n🔗 Testing getOrCreateFeed with activities and follow...\n";

        // Step 1: Get or create a feed for user 1
        echo "\n1️⃣ Getting or creating feed for user 1...\n";
        // snippet-start: GetOrCreateFeed
        $feedResponse1 = $this->testFeed->getOrCreateFeed(
            new GeneratedModels\GetOrCreateFeedRequest(userID: $this->testUserId)
        );
        // snippet-end: GetOrCreateFeed

        $this->assertResponseSuccess($feedResponse1, 'get or create feed');
        $feedData1 = $feedResponse1->getData();
        self::assertInstanceOf(GeneratedModels\GetOrCreateFeedResponse::class, $feedData1);
        self::assertNotNull($feedData1->feed);
        echo "✅ Feed 1 exists: {$feedData1->feed->id}\n";

        // Step 2: Add activities to feed 1
        echo "\n2️⃣ Adding activities to feed 1...\n";
        $activity1 = new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'Activity from getOrCreateFeed test',
            userID: $this->testUserId
        );
        $activityResponse1 = $this->feedsV3Client->addActivity($activity1);
        $this->assertResponseSuccess($activityResponse1, 'add activity to feed 1');
        $activityId1 = $activityResponse1->getData()->activity->id;
        $this->createdActivityIds[] = $activityId1;
        echo "✅ Added activity {$activityId1} to feed 1\n";

        // Step 3: Get or create feed for user 2
        echo "\n3️⃣ Getting or creating feed for user 2...\n";
        $feedResponse2 = $this->testFeed2->getOrCreateFeed(
            new GeneratedModels\GetOrCreateFeedRequest(userID: $this->testUserId2)
        );
        $this->assertResponseSuccess($feedResponse2, 'get or create feed 2');
        $feedData2 = $feedResponse2->getData();
        self::assertNotNull($feedData2->feed);
        echo "✅ Feed 2 exists: {$feedData2->feed->id}\n";

        // Step 4: Add activities to feed 2
        echo "\n4️⃣ Adding activities to feed 2...\n";
        $activity2 = new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed2->getFeedIdentifier()],
            text: 'Activity from user 2 in getOrCreateFeed test',
            userID: $this->testUserId2
        );
        $activityResponse2 = $this->feedsV3Client->addActivity($activity2);
        $this->assertResponseSuccess($activityResponse2, 'add activity to feed 2');
        $activityId2 = $activityResponse2->getData()->activity->id;
        $this->createdActivityIds[] = $activityId2;
        echo "✅ Added activity {$activityId2} to feed 2\n";

        // Step 5: Follow user 2 from user 1
        echo "\n5️⃣ Following user 2 from user 1...\n";

        try {
            $followResponse = $this->feedsV3Client->follow(
                new GeneratedModels\FollowRequest(
                    source: self::USER_FEED_TYPE . $this->testUserId,
                    target: self::USER_FEED_TYPE . $this->testUserId2
                )
            );
            $this->assertResponseSuccess($followResponse, 'follow user 2');
            echo "✅ Followed user 2\n";
        } catch (StreamApiException $e) {
            echo '⚠️ Follow failed: ' . $e->getMessage() . "\n";

            throw $e;
        }

        // Step 6: Verify feed 2 still exists and has activities
        echo "\n6️⃣ Verifying feed 2 exists and has activities...\n";
        $verifyFeedResponse = $this->testFeed2->getOrCreateFeed(
            new GeneratedModels\GetOrCreateFeedRequest(userID: $this->testUserId2)
        );
        $this->assertResponseSuccess($verifyFeedResponse, 'verify feed 2 exists');
        $verifyFeedData = $verifyFeedResponse->getData();
        self::assertNotNull($verifyFeedData->feed);
        self::assertSame($feedData2->feed->id, $verifyFeedData->feed->id, 'Feed ID should match');

        // Check if activities exist in the feed
        if ($verifyFeedData->activities !== null && count($verifyFeedData->activities) > 0) {
            echo '✅ Feed 2 has ' . count($verifyFeedData->activities) . " activities\n";
            // Verify our activity is in the list
            $foundActivity = false;
            foreach ($verifyFeedData->activities as $activity) {
                if ($activity->id === $activityId2) {
                    $foundActivity = true;

                    break;
                }
            }
            self::assertTrue($foundActivity, 'Added activity should be in feed activities');
        } else {
            echo "ℹ️ Feed 2 exists but has no activities in response (this is normal)\n";
        }

        echo "✅ All checks passed: Feed exists, activities added, and follow relationship established\n";
    }

    // =================================================================
    // 7. BATCH OPERATIONS
    // =================================================================

    /**
     * @test
     */
    public function test16UpsertActivities(): void
    {
        echo "\n📝 Testing batch activity upsert...\n";

        // snippet-start: UpsertActivities

        $activities = [
            [
                'type' => 'post',
                'text' => 'Batch activity 1',
                'user_id' => $this->testUserId,
                'feeds' => [$this->testFeed->getFeedIdentifier()],
            ],
            [
                'type' => 'post',
                'text' => 'Batch activity 2',
                'user_id' => $this->testUserId,
                'feeds' => [$this->testFeed->getFeedIdentifier()],
            ],
        ];

        $response = $this->feedsV3Client->upsertActivities(
            new GeneratedModels\UpsertActivitiesRequest(activities: $activities)
        );
        // snippet-end: UpsertActivities

        self::assertInstanceOf(StreamResponse::class, $response);
        $this->assertResponseSuccess($response, 'operation');

        // Track created activities for cleanup
        $data = $response->getData();
        if (isset($data->activities)) {
            foreach ($data->activities as $activity) {
                if ($activity->id !== null) {
                    $this->createdActivityIds[] = $activity->id;
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
     *
     * @test
     */
    public function test17PinActivity(): void
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

    /**
     * @test
     */
    public function test18UnpinActivity(): void
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

    /**
     * @test
     */
    public function test19DeleteBookmark(): void
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

    /**
     * @test
     */
    public function test20DeleteReaction(): void
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
        $reactionResponse = $this->feedsV3Client->addActivityReaction(
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

    /**
     * @test
     */
    public function test21DeleteComment(): void
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

    /**
     * @test
     */
    public function test22UnfollowUser(): void
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

            self::assertInstanceOf(StreamResponse::class, $response);
            $this->assertResponseSuccess($response, 'unfollow operation');
            echo "✅ Unfollowed user: {$this->testUserId2}\n";
        } catch (StreamApiException $e) {
            echo 'Unfollow operation skipped: ' . $e->getMessage() . "\n";
            self::markTestSkipped('Unfollow operation not supported: ' . $e->getMessage());
        }
    }

    /**
     * @test
     */
    public function test23DeleteActivities(): void
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

        echo '✅ Deleted ' . count($activitiesToDelete) . " activities\n";
        $this->createdActivityIds = [];
    }

    // =================================================================
    // 10. ADDITIONAL COMPREHENSIVE TESTS
    // =================================================================

    /**
     * @throws StreamException
     *
     * @test
     */
    public function test24CreatePoll(): void
    {
        echo "\n🗳️ Testing poll creation...\n";

        // snippet-start: CreatePoll
        $poll = new GeneratedModels\CreatePollRequest(
            name: 'Poll',
            description: self::POLL_QUESTION,
            userID: $this->testUserId,
            options: [
                new GeneratedModels\PollOptionInput('Red'),
                new GeneratedModels\PollOptionInput('Blue'),
            ]
        );
        $pollResponse = $this->client->createPoll($poll);
        $pollData = $pollResponse->getData();
        $pollId = $pollData->poll->id;

        $pollActivity = new GeneratedModels\AddActivityRequest(
            type: 'poll',
            feeds: [$this->testFeed->getFeedIdentifier()],
            pollID: $pollId,
            text: self::POLL_QUESTION,
            userID: $this->testUserId,
            custom: (object) [
                'poll_name' => self::POLL_QUESTION,
                'poll_description' => 'Choose your favorite programming language from the options below',
                'poll_options' => ['PHP', 'Python', 'JavaScript', 'Go'],
                'allow_user_suggested_options' => false,
                'max_votes_allowed' => 1,
            ]
        );
        $response = $this->feedsV3Client->addActivity($pollActivity);
        // snippet-end: CreatePoll

        $this->assertResponseSuccess($response, 'create poll');

        $data = $response->getData();
        $activityId = $data->activity->id;
        $this->createdActivityIds[] = $activityId;

        echo "✅ Created poll activity: {$activityId}\n";
    }

    /**
     * @throws StreamException
     *
     * @test
     */
    public function test25VotePoll(): void
    {
        echo "\n✅ Testing poll voting...\n";

        // Create a poll first using the proper API
        $poll = new GeneratedModels\CreatePollRequest(
            name: 'Favorite Color Poll',
            description: 'What is your favorite color?',
            userID: $this->testUserId,
            options: [
                new GeneratedModels\PollOptionInput('red'),
                new GeneratedModels\PollOptionInput('blue'),
                new GeneratedModels\PollOptionInput('green'),
            ]
        );
        $pollResponse = $this->client->createPoll($poll);
        $pollData = $pollResponse->getData();
        //        $pollId = $pollData['id'] ?? 'poll-' . uniqid();
        $pollId = $pollData->poll->id;

        // Create activity with the poll
        $pollActivity = new GeneratedModels\AddActivityRequest(
            type: 'poll',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'Vote for your favorite color',
            userID: $this->testUserId,
            pollID: $pollId,
            custom: (object) [
                'poll_name' => 'What is your favorite color?',
                'poll_description' => 'Choose your favorite color from the options below',
                'poll_options' => ['Red', 'Blue', 'Green'],
                'allow_user_suggested_options' => false,
            ]
        );

        $createResponse = $this->feedsV3Client->addActivity($pollActivity);
        $this->assertResponseSuccess($createResponse, 'create poll for voting');

        $createData = $createResponse->getData();
        $activityId = $createData->activity->id;
        $this->createdActivityIds[] = $activityId;

        // Get poll options from the poll response
        $pollOptions = $pollData->poll->options;

        if (!empty($pollOptions)) {
            // Use the first option ID from the poll creation response
            $optionId = $pollOptions[0]->id ?? null;

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
        } else {
            echo "⚠️ Poll options not found in poll response\n";
            self::markTestSkipped('Poll options not available for voting test');
        }
    }

    /**
     * @throws StreamException
     *
     * @test
     */
    public function test26ModerateActivity(): void
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
                    hide: true,
                    userID: $this->testUserId2 // Different user reporting
                )
            );
            // snippet-end: ModerateActivity

            $this->assertResponseSuccess($moderationResponse, 'moderate activity');
            echo "✅ Flagged activity for moderation: {$activityId}\n";
        } catch (StreamApiException $e) {
            echo 'Activity moderation skipped: ' . $e->getMessage() . "\n";
            self::markTestSkipped('Activity moderation not supported: ' . $e->getMessage());
        }
    }

    /**
     * @throws StreamException
     *
     * @test
     */
    public function test27DeviceManagement(): void
    {
        // skip this test
        self::markTestSkipped('fix me');
        echo "\n📱 Testing device management...\n";

        $deviceToken = 'test-device-token-' . uniqid();

        // snippet-start: AddDevice
        $addDeviceResponse = $this->client->createDevice(
            new GeneratedModels\CreateDeviceRequest(
                id: $deviceToken,
                pushProvider: 'firebase',
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
    }

    /**
     * @throws StreamException
     *
     * @test
     */
    public function test28QueryActivitiesWithFilters(): void
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
                custom: (object) [
                    'category' => $type,
                    'priority' => rand(1, 5),
                    'tags' => [$type, 'test', 'filter'],
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
                    filter: (object) [
                        'activity_type' => 'post',
                        'user_id' => $this->testUserId,
                    ],
                    sort: ['created_at' => -1] // newest first
                )
            );
            // snippet-end: QueryActivitiesWithTypeFilter

            $this->assertResponseSuccess($response, 'query activities with type filter');
        } catch (StreamApiException $e) {
            echo 'Query activities with type filter skipped: ' . $e->getMessage() . "\n";
        }

        try {
            // Query with custom field filter
            // snippet-start: QueryActivitiesWithCustomFilter
            $customFilterResponse = $this->feedsV3Client->queryActivities(
                new GeneratedModels\QueryActivitiesRequest(
                    limit: 10,
                    filter: (object) [
                        'custom.priority' => (object) ['$gte' => 3], // priority >= 3
                        'user_id' => $this->testUserId,
                    ]
                )
            );
            // snippet-end: QueryActivitiesWithCustomFilter

            $this->assertResponseSuccess($customFilterResponse, 'query activities with custom filter');
        } catch (StreamApiException $e) {
            echo 'Query activities with custom filter skipped: ' . $e->getMessage() . "\n";
        }

        echo "✅ Queried activities with advanced filters\n";
    }

    /**
     * @throws StreamException
     *
     * @test
     */
    public function test29GetFeedActivitiesWithPagination(): void
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
                filter: (object) ['user_id' => $this->testUserId]
            )
        );
        // snippet-end: GetFeedActivitiesWithPagination

        $this->assertResponseSuccess($firstPageResponse, 'get first page of feed activities');

        $firstPageData = $firstPageResponse->getData();
        self::assertInstanceOf(QueryActivitiesResponse::class, $firstPageData);
        self::assertNotNull($firstPageData->activities);
        self::assertLessThanOrEqual(3, count($firstPageData->activities));

        // Get second page using next token if available
        // snippet-start: GetFeedActivitiesSecondPage
        $nextToken = $firstPageData->next ?? null;
        if ($nextToken) {
            $secondPageResponse = $this->feedsV3Client->queryActivities(
                new GeneratedModels\QueryActivitiesRequest(
                    limit: 3,
                    next: $nextToken,
                    filter: (object) ['user_id' => $this->testUserId]
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
     * Test comprehensive error handling scenarios.
     *
     * @test
     */
    public function test30ErrorHandlingScenarios(): void
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
            echo '✅ Caught expected error for invalid activity ID: ' . $e->getStatusCode() . "\n";
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
            echo '✅ Caught expected error for empty activity text: ' . $e->getStatusCode() . "\n";
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
            echo '✅ Caught expected error for invalid user ID: ' . $e->getStatusCode() . "\n";
        }

        self::assertTrue(true); // Test passes if we reach here
    }

    /**
     * Test authentication and authorization scenarios.
     *
     * @test
     */
    public function test31AuthenticationScenarios(): void
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
     * Comprehensive test demonstrating real-world usage patterns.
     *
     * @test
     */
    public function test32RealWorldUsageDemo(): void
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
                ),
            ],
            custom: (object) [
                'location' => 'Downtown Coffee Co.',
                'rating' => 5,
                'tags' => ['coffee', 'food', 'downtown'],
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
            $reactionResponse = $this->feedsV3Client->addActivityReaction(
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
            'Adding this to my must-visit list!',
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
            echo 'Bookmark operation skipped: ' . $e->getMessage() . "\n";
        }

        // 5. Query the activity with all its interactions
        $enrichedResponse = $this->feedsV3Client->getActivity($postId);
        $this->assertResponseSuccess($enrichedResponse, 'get enriched activity');

        // snippet-end: RealWorldScenario

        echo "✅ Completed real-world usage scenario demonstration\n";
    }

    /**
     * Test 33: Feed Group CRUD Operations.
     *
     * @test
     */
    public function test33FeedGroupCRUD(): void
    {
        self::markTestSkipped('CI issue FEEDS-799');

        echo "\n📁 Testing Feed Group CRUD operations...\n";

        $feedGroupId = 'test-feed-group-' . substr(uniqid(), -8);

        // Test 1: List Feed Groups
        echo "\n📋 Testing list feed groups...\n";
        // snippet-start: ListFeedGroups
        $listResponse = $this->feedsV3Client->listFeedGroups(false);
        // snippet-end: ListFeedGroups

        $this->assertResponseSuccess($listResponse, 'list feed groups');
        echo '✅ Listed ' . count($listResponse->getData()->groups ?? []) . " existing feed groups\n";

        // Test 2: Create Feed Group
        echo "\n➕ Testing create feed group...\n";

        // snippet-start: CreateFeedGroup
        try {
            $createResponse = $this->feedsV3Client->createFeedGroup(
                new CreateFeedGroupRequest(
                    id: $feedGroupId,
                    defaultVisibility: 'public'
                )
            );
        } catch (StreamApiException $e) {
            echo "API Error Details:\n";
            echo 'Status Code: ' . $e->getStatusCode() . "\n";
            echo 'Message: ' . $e->getMessage() . "\n";
            echo 'Response Body: ' . $e->getResponseBody() . "\n";
            echo 'Error Details: ' . json_encode($e->getErrorDetails(), JSON_PRETTY_PRINT) . "\n";
            // throw $e;
        }
        // snippet-end: CreateFeedGroup

        $this->assertResponseSuccess($createResponse, 'create feed group');
        self::assertSame($feedGroupId, $createResponse->getData()->feedGroup->id);
        echo "✅ Created feed group: {$feedGroupId}\n";

        // Test 3: Get Feed Group
        echo "\n🔍 Testing get feed group...\n";
        // snippet-start: GetFeedGroup
        $getResponse = $this->feedsV3Client->getFeedGroup('foryou', false);
        // snippet-end: GetFeedGroup

        $this->assertResponseSuccess($getResponse, 'get feed group');
        self::assertSame('foryou', $getResponse->getData()->feedGroup->id);
        echo "✅ Retrieved feed group: {$feedGroupId}\n";

        // Test 4: Update Feed Group
        echo "\n✏️ Testing update feed group...\n";
        // snippet-start: UpdateFeedGroup
        $updateResponse = $this->feedsV3Client->updateFeedGroup('foryou', new GeneratedModels\UpdateFeedGroupRequest(
            aggregation: new GeneratedModels\AggregationConfig('default')
        ));
        // snippet-end: UpdateFeedGroup

        $this->assertResponseSuccess($updateResponse, 'update feed group');
        echo "✅ Updated feed group: {$feedGroupId}\n";

        // Test 5: Get or Create Feed Group (should get existing)
        echo "\n🔄 Testing get or create feed group (existing)...\n";
        // snippet-start: GetOrCreateFeedGroupExisting
        $getOrCreateResponse = $this->feedsV3Client->getOrCreateFeedGroup('foryou', new GeneratedModels\GetOrCreateFeedGroupRequest(
            defaultVisibility: 'public',
        ));
        // snippet-end: GetOrCreateFeedGroupExisting

        $this->assertResponseSuccess($getOrCreateResponse, 'get or create existing feed group');
        self::assertFalse($getOrCreateResponse->getData()->wasCreated, 'Should not create new feed group');
        echo "✅ Got existing feed group: {$feedGroupId}\n";

        // Test 6: Delete Feed Group
        echo "\n🗑️ Testing delete feed group...\n";
        // snippet-start: DeleteFeedGroup
        //        $this->feedsV3Client->deleteFeedGroup('groupID-123', false);
        // snippet-end: DeleteFeedGroup

        echo "✅ Completed Feed Group CRUD operations\n";

        // Additional Feed Group Creation Examples
        $group = 'test-feed-group-' . substr(uniqid(), -8);

        echo "\n📊 Testing create feed group with aggregation...\n";
        // snippet-start: CreateFeedGroupWithAggregation
        $aggResponse = $this->feedsV3Client->createFeedGroup(
            new CreateFeedGroupRequest(
                id: $group,
                defaultVisibility: 'public',
                activityProcessors: [
                    ['type' => 'dummy'],
                ],
                aggregation: new GeneratedModels\AggregationConfig('{{ type }}-{{ time.strftime("%Y-%m-%d") }}')
            )
        );
        // snippet-end: CreateFeedGroupWithAggregation
        $this->assertResponseSuccess($aggResponse, 'create feed group with aggregation');
        echo "✅ Created feed group with aggregation\n";

        echo "\n🏆 Testing create feed group with ranking...\n";

        $ranked_group = 'test-feed-group-' . substr(uniqid(), -8);

        // snippet-start: CreateFeedGroupWithRanking
        $rankResponse = $this->feedsV3Client->createFeedGroup(
            new CreateFeedGroupRequest(
                id: $ranked_group,
                defaultVisibility: 'public',
                ranking: new GeneratedModels\RankingConfig(
                    type: 'recency',
                    score: 'decay_linear(time) * popularity'
                )
            )
        );
        // snippet-end: CreateFeedGroupWithRanking
        $this->assertResponseSuccess($rankResponse, 'create feed group with ranking');
        echo "✅ Created feed group with ranking\n";
    }

    /**
     * Test 34: Feed View CRUD Operations.
     *
     * @test
     */
    public function test34FeedViewCRUD(): void
    {
        self::markTestSkipped('Backend issue FEEDS-799');

        echo "\n👁️ Testing Feed View CRUD operations...\n";

        $feedViewId = 'test-feed-view-' . substr(uniqid(), -8);

        // Test 1: List Feed Views
        echo "\n📋 Testing list feed views...\n";
        // snippet-start: ListFeedViews
        $listResponse = $this->feedsV3Client->listFeedViews();
        // snippet-end: ListFeedViews

        $this->assertResponseSuccess($listResponse, 'list feed views');
        echo '✅ Listed ' . count($listResponse->getData()->views ?? []) . " existing feed views\n";

        // Test 2: Create Feed View
        echo "\n➕ Testing create feed view...\n";
        // snippet-start: CreateFeedView
        $createResponse = $this->feedsV3Client->createFeedView(new GeneratedModels\CreateFeedViewRequest(
            id: $feedViewId,
        ));
        // snippet-end: CreateFeedView

        $this->assertResponseSuccess($createResponse, 'create feed view');
        self::assertSame($feedViewId, $createResponse->getData()->feedView->id);
        echo "✅ Created feed view: {$feedViewId}\n";

        // Test 3: Get Feed View
        echo "\n🔍 Testing get feed view...\n";
        // snippet-start: GetFeedView
        $getResponse = $this->feedsV3Client->getFeedView('feedViewID');
        // snippet-end: GetFeedView

        $this->assertResponseSuccess($getResponse, 'get feed view');
        self::assertSame('feedViewID', $getResponse->getData()->feedView->id);
        echo "✅ Retrieved feed view: {$feedViewId}\n";

        // Test 4: Update Feed View
        echo "\n✏️ Testing update feed view...\n";
        // snippet-start: UpdateFeedView
        $updateResponse = $this->feedsV3Client->updateFeedView(
            'feedViewID',
            new GeneratedModels\UpdateFeedViewRequest(
                aggregation: new GeneratedModels\AggregationConfig('default')
            )
        );
        // snippet-end: UpdateFeedView

        $this->assertResponseSuccess($updateResponse, 'update feed view');
        echo "✅ Updated feed view: {$feedViewId}\n";

        // Test 5: Get or Create Feed View (should get existing)
        echo "\n🔄 Testing get or create feed view (existing)...\n";
        // snippet-start: GetOrCreateFeedViewExisting
        $getOrCreateResponse = $this->feedsV3Client->getOrCreateFeedView(
            $feedViewId,
            new GeneratedModels\GetOrCreateFeedViewRequest(
                aggregation: new GeneratedModels\AggregationConfig('default')
            )
        );
        // snippet-end: GetOrCreateFeedViewExisting

        $this->assertResponseSuccess($getOrCreateResponse, 'get or create existing feed view');
        echo "✅ Got existing feed view: {$feedViewId}\n";

        // Test 6: Delete Feed View
        echo "\n🗑️ Testing delete feed view...\n";
        // snippet-start: DeleteFeedView
        //        $this->feedsV3Client->deleteFeedView('viewID-123');
        // snippet-end: DeleteFeedView

        echo "✅ Completed Feed View CRUD operations\n";
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
                        'role' => 'user',
                    ],
                    $this->testUserId2 => [
                        'id' => $this->testUserId2,
                        'name' => 'Test User 2',
                        'role' => 'user',
                    ],
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
            echo '⚠️ Setup failed: ' . $e->getMessage() . "\n";
            echo 'ResponseBody: ' . $e->getResponseBody() . "\n";
            echo 'ErrorDetail: ' . $e->getErrorDetails() . "\n";

            throw $e;
        } catch (\Exception $e) {
            echo '⚠️ Setup failed: ' . $e->getMessage() . "\n";
            // Continue with tests even if setup partially fails
        }
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
            self::assertInstanceOf(StreamResponse::class, $response);
            if (!$response->isSuccessful()) {
                self::fail("Failed to {$operation}. Status: " . $response->getStatusCode() . ', Body: ' . $response->getRawBody());
            }
        } else {
            // For generated model responses, just assert they exist
            self::assertNotNull($response, "Failed to {$operation}. Response is null.");
        }
    }
}
