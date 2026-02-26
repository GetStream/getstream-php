<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\Client;
use GetStream\ClientBuilder;
use GetStream\Exceptions\StreamException;
use GetStream\Feed;
use GetStream\FeedsV3Client;
use GetStream\GeneratedModels;
use GetStream\GeneratedModels\GetActivityResponse;
use GetStream\GeneratedModels\QueryActivitiesResponse;
use GetStream\StreamResponse;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

/**
 * Integration tests for Feed activity operations (create, query, update).
 */
#[Group('integration')]
class FeedActivityIntegrationTest extends TestCase
{
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
    // ACTIVITY OPERATIONS
    // =================================================================

    /**
     * @test
     */
    public function testCreateActivity(): void
    {
        // snippet-start: AddActivity
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'This is a test activity from PHP SDK',
            userID: $this->testUserId,
            custom: (object) ['test_field' => 'test_value', 'timestamp' => time()]
        );
        $response = $this->feedsV3Client->addActivity($activity);
        // snippet-end: AddActivity

        $this->assertResponseSuccess($response, 'add activity');

        $activityResponse = $response->getData();
        self::assertInstanceOf(GeneratedModels\AddActivityResponse::class, $activityResponse);
        self::assertNotNull($activityResponse->activity);
        self::assertNotNull($activityResponse->activity->id);
        self::assertSame($activity->text, $activityResponse->activity->text);

        $this->createdActivityIds[] = $activityResponse->activity->id;
    }

    /**
     * @test
     */
    public function testCreateActivityWithAttachments(): void
    {
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
            custom: (object) ['location' => 'New York City', 'camera' => 'iPhone 15 Pro']
        );
        $response = $this->feedsV3Client->addActivity($activity);
        // snippet-end: AddActivityWithImageAttachment

        $this->assertResponseSuccess($response, 'add activity with image attachment');
        $this->createdActivityIds[] = $response->getData()->activity->id;
    }

    /**
     * @test
     */
    public function testCreateVideoActivity(): void
    {
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
            custom: (object) ['video_quality' => '4K', 'duration_seconds' => 120]
        );
        $response = $this->feedsV3Client->addActivity($activity);
        // snippet-end: AddVideoActivity

        $this->assertResponseSuccess($response, 'add video activity');
        $this->createdActivityIds[] = $response->getData()->activity->id;
    }

    /**
     * @test
     */
    public function testCreateStoryActivityWithExpiration(): void
    {
        // snippet-start: AddStoryActivityWithExpiration
        $tomorrow = new \DateTime('+1 day');
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'story',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'My daily story - expires tomorrow!',
            userID: $this->testUserId,
            expiresAt: $tomorrow->format('c'),
            attachments: [
                new GeneratedModels\Attachment(imageUrl: 'https://example.com/story-image.jpg', type: 'image'),
                new GeneratedModels\Attachment(
                    assetUrl: 'https://example.com/story-video.mp4',
                    type: 'video',
                    custom: (object) ['duration' => 15]
                ),
            ],
            custom: (object) ['story_type' => 'daily', 'auto_expire' => true]
        );
        $response = $this->feedsV3Client->addActivity($activity);
        // snippet-end: AddStoryActivityWithExpiration

        $this->assertResponseSuccess($response, 'add story activity with expiration');
        $this->createdActivityIds[] = $response->getData()->activity->id;
    }

    /**
     * @test
     */
    public function testCreateActivityMultipleFeeds(): void
    {
        // snippet-start: AddActivityToMultipleFeeds
        $activity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [
                $this->testFeed->getFeedIdentifier(),
                $this->testFeed2->getFeedIdentifier(),
            ],
            text: 'This post appears in multiple feeds!',
            userID: $this->testUserId,
            custom: (object) ['cross_posted' => true, 'target_feeds' => 2]
        );
        $response = $this->feedsV3Client->addActivity($activity);
        // snippet-end: AddActivityToMultipleFeeds

        $this->assertResponseSuccess($response, 'add activity to multiple feeds');
        $this->createdActivityIds[] = $response->getData()->activity->id;
    }

    /**
     * @test
     */
    public function testUploadImageAndFile(): void
    {
        $testImagePath = __DIR__ . '/testupload.png';

        if (!file_exists($testImagePath)) {
            self::markTestSkipped("Test image file not found: {$testImagePath}");
        }

        // snippet-start: UploadImage
        $imageUploadRequest = new GeneratedModels\ImageUploadRequest(
            file: $testImagePath,
            user: new GeneratedModels\OnlyUserID(id: $this->testUserId),
            uploadSizes: [['width' => 100, 'height' => 100, 'resize' => 'scale', 'crop' => 'center']]
        );
        $imageResponse = $this->client->uploadImage($imageUploadRequest);
        // snippet-end: UploadImage

        $this->assertResponseSuccess($imageResponse, 'upload image');
        self::assertNotEmpty($imageResponse->getData()->file);

        // Upload via base64
        $base64Image = base64_encode((string) file_get_contents($testImagePath));
        $imageResponse2 = $this->client->uploadImage(new GeneratedModels\ImageUploadRequest(
            file: $base64Image,
            user: new GeneratedModels\OnlyUserID(id: $this->testUserId),
            uploadSizes: [['width' => 200, 'height' => 200, 'resize' => 'fill', 'crop' => 'center']]
        ));
        $this->assertResponseSuccess($imageResponse2, 'upload image with base64');

        // snippet-start: UploadFile
        $namedTempPath = sys_get_temp_dir() . '/stream_test_' . uniqid() . '.txt';
        file_put_contents($namedTempPath, 'test content from PHP SDK integration test');
        $fileResponse = $this->client->uploadFile(new GeneratedModels\FileUploadRequest(
            file: $namedTempPath,
            user: new GeneratedModels\OnlyUserID(id: $this->testUserId)
        ));
        // snippet-end: UploadFile

        $this->assertResponseSuccess($fileResponse, 'upload file');
        self::assertNotEmpty($fileResponse->getData()->file);
        @unlink($namedTempPath);
    }

    /**
     * @test
     */
    public function testQueryActivities(): void
    {
        // snippet-start: QueryActivities
        $response = $this->feedsV3Client->queryActivities(
            new GeneratedModels\QueryActivitiesRequest(
                limit: 10,
                filter: (object) ['activity_type' => 'post']
            )
        );
        // snippet-end: QueryActivities

        $this->assertResponseSuccess($response, 'query activities');
        self::assertInstanceOf(QueryActivitiesResponse::class, $response->getData());
    }

    /**
     * @throws StreamException
     *
     * @test
     */
    public function testGetSingleActivity(): void
    {
        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for retrieval test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        ));
        $this->assertResponseSuccess($createResponse, 'create activity for retrieval test');

        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        // snippet-start: GetActivity
        $response = $this->feedsV3Client->getActivity($activityId);
        // snippet-end: GetActivity

        $this->assertResponseSuccess($response, 'get activity');
        $data = $response->getData();
        self::assertInstanceOf(GetActivityResponse::class, $data);
        self::assertSame($activityId, $data->activity->id);
    }

    /**
     * @test
     */
    public function testUpdateActivity(): void
    {
        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for update test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        ));
        $this->assertResponseSuccess($createResponse, 'create activity for update test');

        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        // snippet-start: UpdateActivity
        $response = $this->feedsV3Client->updateActivity(
            $activityId,
            new GeneratedModels\UpdateActivityRequest(
                text: 'Updated activity text from PHP SDK',
                userID: $this->testUserId,
                custom: (object) ['updated' => true, 'update_time' => time()]
            )
        );
        // snippet-end: UpdateActivity

        $this->assertResponseSuccess($response, 'update activity');
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
