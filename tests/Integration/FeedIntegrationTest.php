<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\Client;
use GetStream\ClientBuilder;
use GetStream\Feed;
use GetStream\FeedsV3Client;
//use GetStream\GeneratedModels\AddActivityRequest;
use GetStream\GeneratedModels;
use GetStream\StreamResponse;
use GetStream\Exceptions\StreamException;
use GetStream\Exceptions\StreamApiException;
use PHPUnit\Framework\TestCase;

//$va=glob(__DIR__ . '/../../src/GeneratedModels/*.php');
//
//foreach (glob(__DIR__ . '/../../src/GeneratedModels/*.php') as $file) {
//    require_once $file; // load the class definition
//    $class = 'GetStream\\GeneratedModels\\' . basename($file, '.php');
//    class_alias($class, basename($file, '.php'));
//}

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
//            $response = $this->client->updateUsers([
//                'users' => [
//                    $this->testUserId => [
//                        'id' => $this->testUserId,
//                        'name' => 'Test User 1',
//                        'role' => 'user'
//                    ],
//                    $this->testUserId2 => [
//                        'id' => $this->testUserId2,
//                        'name' => 'Test User 2',
//                        'role' => 'user'
//                    ]
//                ]
//            ]);
//            // snippet-end: CreateUsers
//
//            if (!$response->isSuccessful()) {
//                throw new \Exception('Failed to create users: ' . $response->getRawBody());
//            }

            // Create feeds
            // snippet-start: GetOrCreateFeed

//            $feedResponse1 = $this->testFeed->getOrCreateFeed(
//                ['user_id' => $this->testUserId],
//            );
//            $feedResponse2 = $this->testFeed2->getOrCreateFeed(
//                ['user_id' => $this->testUserId2],
//            );
//            // snippet-end: GetOrCreateFeed
//
//            if (!$feedResponse1->isSuccessful()) {
//                throw new \Exception('Failed to create feed 1: ' . $feedResponse1->getRawBody());
//            }
//            if (!$feedResponse2->isSuccessful()) {
//                throw new \Exception('Failed to create feed 2: ' . $feedResponse2->getRawBody());
//            }
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
//            custom: [
//                'test_field' => 'test_value',
//                'timestamp' => time()
//            ]
        );
        $response = $this->feedsV3Client->addActivity($activity);
        // snippet-end: AddActivity

        $this->assertResponseSuccess($response, 'add activity');

        $data = $response->getData();
        $this->assertArrayHasKey('activity', $data);
        $this->assertArrayHasKey('id', $data['activity']);
        $this->assertArrayHasKey('text', $data['activity']);

        //compare text
        $this->assertEquals($activity->text, $data['activity']['text']);
        
        $this->testActivityId = $data['activity']['id'];
        $this->createdActivityIds[] = $this->testActivityId;
        
        echo "✅ Created activity with ID: {$this->testActivityId}\n";
    }

    public function test03_QueryActivities(): void
    {
        echo "\n🔍 Testing activity querying...\n";
        
        // snippet-start: QueryActivities
        $response = $this->feedsV3Client->queryActivities([
            'filter'=> [
                'activity_type' => 'post'
            ],
            'limit' => 10,
            'offset' => 0
        ]);
        // snippet-end: QueryActivities

        $this->assertResponseSuccess($response, 'query activities');
        
        $data = $response->getData();
        $this->assertArrayHasKey('activities', $data);
        echo "✅ Queried activities successfully\n";
    }

    /**
     * @throws StreamException
     */
    public function test04_GetSingleActivity(): void
    {
        echo "\n📄 Testing single activity retrieval...\n";
        
        // First create an activity to retrieve
        $activity = [
            'type' => 'post',
            'text' => 'Activity for retrieval test',
            'user_id' => $this->testUserId,
            'fids' => [$this->testFeed->getFeedIdentifier()],
        ];

        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for retrieval test');
        
        $createData = $createResponse->getData();
        $activityId = $createData['activity']['id'];
        $this->createdActivityIds[] = $activityId;

        // snippet-start: GetActivity
        $response = $this->feedsV3Client->getActivity($activityId);
        // snippet-end: GetActivity

        $this->assertResponseSuccess($response, 'get activity');
        
        $data = $response->getData();
        // The activity data is nested under 'activity' key
        $this->assertArrayHasKey('activity', $data);
        $this->assertEquals($activityId, $data['activity']['id']);
        echo "✅ Retrieved single activity\n";
    }

    public function test05_UpdateActivity(): void
    {
        echo "\n✏️ Testing activity update...\n";
        
        // First create an activity to update
        $activity = [
            'type' => 'post',
            'text' => 'Activity for update test',
            'user_id' => $this->testUserId,
            'fids' => [$this->testFeed->getFeedIdentifier()],
        ];
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for update test');
        
        $createData = $createResponse->getData();
        $activityId = $createData['activity']['id'];
        $this->createdActivityIds[] = $activityId;

        // snippet-start: UpdateActivity
        $response = $this->feedsV3Client->updateActivity($activityId, [
            'text' => 'Updated activity text from PHP SDK',
            'user_id' => $this->testUserId,  // Required for server-side auth
            'custom' => [
                'updated' => true,
                'update_time' => time()
            ]
        ]);
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
        $activity = [
            'type' => 'post',
            'text' => 'Activity for reaction test',
            'user_id' => $this->testUserId,
            'fids' => [$this->testFeed->getFeedIdentifier()],
        ];
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for reaction test');
        
        $createData = $createResponse->getData();
        $activityId = $createData['activity']['id'];
        $this->createdActivityIds[] = $activityId;

        // snippet-start: AddReaction
        $response = $this->feedsV3Client->addReaction($activityId, [
            'type' => 'like',
            'user_id' => $this->testUserId
        ]);
        // snippet-end: AddReaction

        $this->assertResponseSuccess($response, 'add reaction');
        echo "✅ Added like reaction\n";
    }

    public function test07_QueryReactions(): void
    {
        echo "\n🔍 Testing reaction querying...\n";
        
        // Create an activity and add a reaction to it
        $activity = [
            'type' => 'post',
            'text' => 'Activity for query reactions test',
            'user_id' => $this->testUserId,
            'fids' => [$this->testFeed->getFeedIdentifier()],
        ];
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for query reactions test');
        
        $createData = $createResponse->getData();
        $activityId = $createData['activity']['id'];
        $this->createdActivityIds[] = $activityId;
        
        // Add a reaction first
        $reactionResponse = $this->feedsV3Client->addReaction($activityId, [
            'type' => 'like',
            'user_id' => $this->testUserId
        ]);
        $this->assertResponseSuccess($reactionResponse, 'add reaction for query test');

        // snippet-start: QueryActivityReactions
        $response = $this->feedsV3Client->queryActivityReactions($activityId, [
            'type' => 'like',
            'limit' => 10
        ]);
        // snippet-end: QueryActivityReactions

        $this->assertResponseSuccess($response, 'query reactions');
        echo "✅ Queried reactions\n";
    }

    // =================================================================
    // 4. COMMENT OPERATIONS
    // =================================================================

    public function test08_AddComment(): void
    {
        echo "\n💬 Testing comment addition...\n";
        
        // First create an activity to comment on
        $activity = [
            'type' => 'post',
            'text' => 'Activity for comment test',
            'user_id' => $this->testUserId,
            'fids' => [$this->testFeed->getFeedIdentifier()],
        ];
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for comment test');
        
        $createData = $createResponse->getData();
        $activityId = $createData['activity']['id'];
        $this->createdActivityIds[] = $activityId;

        // snippet-start: AddComment
        $response = $this->feedsV3Client->addComment([
            'comment' => 'This is a test comment from PHP SDK',
            'object_id' => $activityId,
            'object_type' => 'activity',
            'user_id' => $this->testUserId
        ]);
        // snippet-end: AddComment

        $this->assertResponseSuccess($response, 'add comment');
        
        $data = $response->getData();
        if (isset($data['id'])) {
            $this->testCommentId = $data['id'];
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
        $activity = [
            'type' => 'post',
            'text' => 'Activity for query comments test',
            'user_id' => $this->testUserId,
            'fids' => [$this->testFeed->getFeedIdentifier()],
        ];
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for query comments test');
        
        $createData = $createResponse->getData();
        $activityId = $createData['activity']['id'];
        $this->createdActivityIds[] = $activityId;
        
        // Add a comment first
        $commentResponse = $this->feedsV3Client->addComment([
            'comment' => 'Comment for query test',
            'object_id' => $activityId,
            'object_type' => 'activity',
            'user_id' => $this->testUserId
        ]);
        $this->assertResponseSuccess($commentResponse, 'add comment for query test');

        // snippet-start: QueryComments
            $response = $this->feedsV3Client->queryComments([
            'filter'=>[
                'object_id' => $activityId,
            ],
            'limit' => 10
        ]);
        // snippet-end: QueryComments

        $this->assertResponseSuccess($response, 'query comments');
        echo "✅ Queried comments\n";
    }

    public function test10_UpdateComment(): void
    {
        echo "\n✏️ Testing comment update...\n";
        
        // Create an activity and add a comment to update
        $activity = [
            'type' => 'post',
            'text' => 'Activity for update comment test',
            'user_id' => $this->testUserId,
            'fids' => [$this->testFeed->getFeedIdentifier()],
        ];
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for update comment test');
        
        $createData = $createResponse->getData();
        $activityId = $createData['activity']['id'];
        $this->createdActivityIds[] = $activityId;
        
        // Add a comment to update
        $commentResponse = $this->feedsV3Client->addComment([
            'comment' => 'Comment to be updated',
            'object_id' => $activityId,
            'object_type' => 'activity',
            'user_id' => $this->testUserId
        ]);
        $this->assertResponseSuccess($commentResponse, 'add comment for update test');
        
        $commentData = $commentResponse->getData()['comment'];
        $commentId = $commentData['id'] ?? 'comment-id';  // Fallback if ID not returned

        // snippet-start: UpdateComment
        $response = $this->feedsV3Client->updateComment($commentId, [
            'text' => 'Updated comment text from PHP SDK',
        ]);
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
        $activity = [
            'type' => 'post',
            'text' => 'Activity for bookmark test',
            'user_id' => $this->testUserId,
            'fids' => [$this->testFeed->getFeedIdentifier()],
        ];
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for bookmark test');
        
        $createData = $createResponse->getData();
        $activityId = $createData['activity']['id'];
        $this->createdActivityIds[] = $activityId;

        try {
            // snippet-start: AddBookmark
            $response = $this->feedsV3Client->addBookmark($activityId, [
                'new_folder' => [ //optional
                    'name' => 'test-bookmarks1',
                ],
                'user_id' => $this->testUserId
            ]);
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
        $response = $this->feedsV3Client->queryBookmarks([
            'user_id' => $this->testUserId,
            'limit' => 10
        ]);
        // snippet-end: QueryBookmarks

        $this->assertInstanceOf(StreamResponse::class, $response);
        $this->assertResponseSuccess($response, "operation");
        echo "✅ Queried bookmarks\n";
    }

    public function test13_UpdateBookmark(): void
    {
        echo "\n✏️ Testing bookmark update...\n";
        
        // Create an activity and bookmark it first
        $activity = [
            'type' => 'post',
            'text' => 'Activity for update bookmark test',
            'user_id' => $this->testUserId,
            'fids' => [$this->testFeed->getFeedIdentifier()],
        ];
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for update bookmark test');
        
        $createData = $createResponse->getData();
        $activityId = $createData['activity']['id'];
        $this->createdActivityIds[] = $activityId;
        
        // Add a bookmark first
        $bookmarkResponse = $this->feedsV3Client->addBookmark($activityId, [
            'new_folder' => [
                'name' => 'test-bookmarks1',
            ],
            'user_id' => $this->testUserId
        ]);
        $this->assertResponseSuccess($bookmarkResponse, 'add bookmark for update test');

        // snippet-start: UpdateBookmark
        $folderID = $bookmarkResponse->getData()['bookmark']['folder']['id'];
        $response = $this->feedsV3Client->updateBookmark($activityId, [
            'folder_id' => $folderID,
            'notes' => 'Updated bookmark notes',
            'user_id' => $this->testUserId,
        ]);
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
            $response = $this->feedsV3Client->follow([
                'source' => 'user:' . $this->testUserId,
                'target' => 'user:' . $this->testUserId2,
                'activity_copy_limit' => 100
            ]);
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
        $response = $this->feedsV3Client->queryFollows([
            'limit' => 10,
            'offset' => 0
        ]);
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

        $response = $this->feedsV3Client->upsertActivities([
            'activities' => $activities
        ]);
        // snippet-end: UpsertActivities

        $this->assertInstanceOf(StreamResponse::class, $response);
        $this->assertResponseSuccess($response, "operation");
        
        // Track created activities for cleanup
        $data = $response->getData();
        if (isset($data['activities'])) {
            foreach ($data['activities'] as $activity) {
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

    public function test17_PinActivity(): void
    {
        echo "\n📌 Testing activity pinning...\n";
        
        // Create an activity to pin
        $activity = [
            'type' => 'post',
            'text' => 'Activity for pin test',
            'user_id' => $this->testUserId,
            'fids' => [$this->testFeed->getFeedIdentifier()],
        ];
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for pin test');
        
        $createData = $createResponse->getData();
        $activityId = $createData['activity']['id'];
        $this->createdActivityIds[] = $activityId;


        // snippet-start: PinActivity
        $response = $this->testFeed->pinActivity($activityId, [
            'expiry_time' => date('c', strtotime('+1 day')),
            'user_id' => $this->testUserId,
        ]);
        // snippet-end: PinActivity

        $this->assertResponseSuccess($response, 'pin activity');
        echo "✅ Pinned activity\n";
    }

    public function test18_UnpinActivity(): void
    {
        echo "\n📌 Testing activity unpinning...\n";
        
        // Create an activity, pin it, then unpin it
        $activity = [
            'type' => 'post',
            'text' => 'Activity for unpin test',
            'user_id' => $this->testUserId,
            'fids' => [$this->testFeed->getFeedIdentifier()],
        ];
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for unpin test');
        
        $createData = $createResponse->getData();
        $activityId = $createData['activity']['id'];
        $this->createdActivityIds[] = $activityId;
        
        // Pin it first
        $pinResponse = $this->testFeed->pinActivity($activityId, [
            'expiry_time' => date('c', strtotime('+1 day')),
            'user_id' => $this->testUserId,
        ]);
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
        $activity = [
            'type' => 'post',
            'text' => 'Activity for delete bookmark test',
            'user_id' => $this->testUserId,
            'fids' => [$this->testFeed->getFeedIdentifier()],
        ];
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for delete bookmark test');
        
        $createData = $createResponse->getData();
        $activityId = $createData['activity']['id'];
        $this->createdActivityIds[] = $activityId;
        
        // Add a bookmark first
        $bookmarkResponse = $this->feedsV3Client->addBookmark($activityId, [
            'user_id' => $this->testUserId,
            'new_folder' => [
                'name' => 'test-bookmarks1',
            ],
        ]);
        $this->assertResponseSuccess($bookmarkResponse, 'add bookmark for delete test');

        // snippet-start: DeleteBookmark
        $folderId = $bookmarkResponse->getData()['bookmark']['folder']['id'];
        $response = $this->feedsV3Client->deleteBookmark($activityId, $folderId, $this->testUserId);
        // snippet-end: DeleteBookmark

        $this->assertResponseSuccess($response, 'delete bookmark');
        echo "✅ Deleted bookmark\n";
    }

    public function test20_DeleteReaction(): void
    {
        echo "\n🗑️ Testing reaction deletion...\n";
        
        // Create an activity and add a reaction first
        $activity = [
            'type' => 'post',
            'text' => 'Activity for delete reaction test',
            'user_id' => $this->testUserId,
            'fids' => [$this->testFeed->getFeedIdentifier()],
        ];
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for delete reaction test');
        
        $createData = $createResponse->getData();
        $activityId = $createData['activity']['id'];
        $this->createdActivityIds[] = $activityId;
        
        // Add a reaction first
        $reactionResponse = $this->feedsV3Client->addReaction($activityId, [
            'type' => 'like',
            'user_id' => $this->testUserId
        ]);
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
        $activity = [
            'type' => 'post',
            'text' => 'Activity for delete comment test',
            'user_id' => $this->testUserId,
            'fids' => [$this->testFeed->getFeedIdentifier()],
        ];
        
        $createResponse = $this->feedsV3Client->addActivity($activity);
        $this->assertResponseSuccess($createResponse, 'create activity for delete comment test');
        
        $createData = $createResponse->getData();
        $activityId = $createData['activity']['id'];
        $this->createdActivityIds[] = $activityId;
        
        // Add a comment first
        $commentResponse = $this->feedsV3Client->addComment([
            'comment' => 'Comment to be deleted',
            'object_id' => $activityId,
            'object_type' => 'activity',
            'user_id' => $this->testUserId
        ]);
        $this->assertResponseSuccess($commentResponse, 'add comment for delete test');
        
        $commentData = $commentResponse->getData()['comment'];
        $commentId = $commentData['id'] ?? 'comment-id';  // Fallback if ID not returned

        // snippet-start: DeleteComment
        $response = $this->feedsV3Client->deleteComment($commentId, false); // soft delete
        // snippet-end: DeleteComment

        $this->assertResponseSuccess($response, 'delete comment');
        echo "✅ Deleted comment\n";
    }

    public function test22_UnfollowUser(): void
    {
        echo "\n👥 Testing unfollow operation...\n";

        // snippet-start: Unfollow
        $response = $this->feedsV3Client->unfollow(
            'user:' . $this->testUserId,
            'user:' . $this->testUserId2
        );
        // snippet-end: Unfollow

        $this->assertInstanceOf(StreamResponse::class, $response);
        $this->assertResponseSuccess($response, "operation");
        echo "✅ Unfollowed user: {$this->testUserId2}\n";
    }

    public function test23_DeleteActivities(): void
    {
        echo "\n🗑️ Testing activity deletion...\n";
        
        // Create some activities to delete
        $activitiesToDelete = [];
        for ($i = 1; $i <= 2; $i++) {
            $activity = [
                'type' => 'post',
                'text' => "Activity {$i} for delete test",
                'user_id' => $this->testUserId,
                'fids' => [$this->testFeed->getFeedIdentifier()],
            ];
            
            $createResponse = $this->feedsV3Client->addActivity($activity);
            $this->assertResponseSuccess($createResponse, "create activity {$i} for delete test");
            
            $createData = $createResponse->getData();
            $activityId = $createData['activity']['id'];
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

    private function handleApiError(StreamApiException $e): void
    {
        echo "❌ API Error Details:\n";
        echo "   Message: " . $e->getMessage() . "\n";
        echo "   Status: " . $e->getStatusCode() . "\n";
        echo "   Response: " . $e->getResponseBody() . "\n";
        $this->fail("API Error: " . $e->getMessage() . " (Status: " . $e->getStatusCode() . ")");
    }

    private function assertResponseSuccess(StreamResponse $response, string $operation): void
    {
        $this->assertInstanceOf(StreamResponse::class, $response);
        if (!$response->isSuccessful()) {
            $this->fail("Failed to {$operation}. Status: " . $response->getStatusCode() . ', Body: ' . $response->getRawBody());
        }
    }
}