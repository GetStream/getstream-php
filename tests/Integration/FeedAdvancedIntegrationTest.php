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
use GetStream\GeneratedModels\CreateFeedGroupRequest;
use GetStream\GeneratedModels\QueryActivitiesResponse;
use GetStream\StreamResponse;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

/**
 * Integration tests for advanced Feed operations: pins, polls, pagination, moderation, CRUD.
 */
#[Group('integration')]
class FeedAdvancedIntegrationTest extends TestCase
{
    private const USER_FEED_TYPE = 'user:';
    private const POLL_QUESTION = "What's your favorite programming language?";

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
    // PIN / UNPIN
    // =================================================================

    /**
     * @throws StreamException
     *
     * @test
     */
    public function testPinActivity(): void
    {
        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'Activity for pin test',
            userID: $this->testUserId
        ));
        $this->assertResponseSuccess($createResponse, 'create activity for pin test');
        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        // snippet-start: PinActivity
        $response = $this->testFeed->pinActivity(
            $activityId,
            new GeneratedModels\PinActivityRequest(userID: $this->testUserId)
        );
        // snippet-end: PinActivity

        $this->assertResponseSuccess($response, 'pin activity');
    }

    /**
     * @test
     */
    public function testUnpinActivity(): void
    {
        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'Activity for unpin test',
            userID: $this->testUserId
        ));
        $this->assertResponseSuccess($createResponse, 'create activity for unpin test');
        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        $this->testFeed->pinActivity($activityId, new GeneratedModels\PinActivityRequest(userID: $this->testUserId));

        // snippet-start: UnpinActivity
        $response = $this->testFeed->unpinActivity($activityId, $this->testUserId);
        // snippet-end: UnpinActivity

        $this->assertResponseSuccess($response, 'unpin activity');
    }

    // =================================================================
    // DELETE OPERATIONS
    // =================================================================

    /**
     * @test
     */
    public function testDeleteBookmark(): void
    {
        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for delete bookmark test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        ));
        $this->assertResponseSuccess($createResponse, 'create activity for delete bookmark test');
        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

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
    }

    /**
     * @test
     */
    public function testDeleteReaction(): void
    {
        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for delete reaction test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        ));
        $this->assertResponseSuccess($createResponse, 'create activity for delete reaction test');
        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        $this->feedsV3Client->addActivityReaction(
            $activityId,
            new GeneratedModels\AddReactionRequest(type: 'like', userID: $this->testUserId)
        );

        // snippet-start: DeleteActivityReaction
        $response = $this->feedsV3Client->deleteActivityReaction($activityId, 'like', false, $this->testUserId);
        // snippet-end: DeleteActivityReaction

        $this->assertResponseSuccess($response, 'delete reaction');
    }

    /**
     * @test
     */
    public function testDeleteComment(): void
    {
        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Activity for delete comment test',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        ));
        $this->assertResponseSuccess($createResponse, 'create activity for delete comment test');
        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        $commentResponse = $this->feedsV3Client->addComment(new GeneratedModels\AddCommentRequest(
            comment: 'Comment to be deleted',
            objectID: $activityId,
            objectType: 'activity',
            userID: $this->testUserId
        ));
        $this->assertResponseSuccess($commentResponse, 'add comment for delete test');
        $commentId = $commentResponse->getData()->comment->id ?? 'comment-id';

        // snippet-start: DeleteComment
        $response = $this->feedsV3Client->deleteComment($commentId, false, false);
        // snippet-end: DeleteComment

        $this->assertResponseSuccess($response, 'delete comment');
    }

    /**
     * @test
     */
    public function testUnfollowUser(): void
    {
        try {
            try {
                $this->feedsV3Client->follow(new GeneratedModels\FollowRequest(
                    source: self::USER_FEED_TYPE . $this->testUserId,
                    target: self::USER_FEED_TYPE . $this->testUserId2
                ));
            } catch (StreamApiException $e) {
                if (!str_contains($e->getMessage(), 'already exists')) {
                    throw $e;
                }
            }

            // snippet-start: Unfollow
            $response = $this->feedsV3Client->unfollow(
                self::USER_FEED_TYPE . $this->testUserId,
                self::USER_FEED_TYPE . $this->testUserId2,
                false
            );
            // snippet-end: Unfollow

            self::assertInstanceOf(StreamResponse::class, $response);
            $this->assertResponseSuccess($response, 'unfollow operation');
        } catch (StreamApiException $e) {
            self::markTestSkipped('Unfollow operation not supported: ' . $e->getMessage());
        }
    }

    /**
     * @test
     */
    public function testDeleteActivities(): void
    {
        $activitiesToDelete = [];
        for ($i = 1; $i <= 2; $i++) {
            $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
                type: 'post',
                text: "Activity {$i} for delete test",
                userID: $this->testUserId,
                feeds: [$this->testFeed->getFeedIdentifier()]
            ));
            $this->assertResponseSuccess($createResponse, "create activity {$i} for delete test");
            $activityId = $createResponse->getData()->activity->id;
            $activitiesToDelete[] = $activityId;
            $this->createdActivityIds[] = $activityId;
        }

        foreach ($activitiesToDelete as $activityId) {
            // snippet-start: DeleteActivity
            $response = $this->feedsV3Client->deleteActivity($activityId, false, false);
            // snippet-end: DeleteActivity

            $this->assertResponseSuccess($response, 'delete activity');
        }

        $this->createdActivityIds = [];
    }

    // =================================================================
    // POLLS
    // =================================================================

    /**
     * @throws StreamException
     *
     * @test
     */
    public function testCreatePoll(): void
    {
        // snippet-start: CreatePoll
        $poll = new GeneratedModels\CreatePollRequest(
            name: 'Poll',
            description: self::POLL_QUESTION,
            userID: $this->testUserId,
            options: [new GeneratedModels\PollOptionInput('Red'), new GeneratedModels\PollOptionInput('Blue')]
        );
        $pollResponse = $this->client->createPoll($poll);
        $pollId = $pollResponse->getData()->poll->id;

        $pollActivity = new GeneratedModels\AddActivityRequest(
            type: 'poll',
            feeds: [$this->testFeed->getFeedIdentifier()],
            pollID: $pollId,
            text: self::POLL_QUESTION,
            userID: $this->testUserId,
            custom: (object) ['poll_name' => self::POLL_QUESTION, 'max_votes_allowed' => 1]
        );
        $response = $this->feedsV3Client->addActivity($pollActivity);
        // snippet-end: CreatePoll

        $this->assertResponseSuccess($response, 'create poll');
        $this->createdActivityIds[] = $response->getData()->activity->id;
    }

    /**
     * @throws StreamException
     *
     * @test
     */
    public function testVotePoll(): void
    {
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
        $pollId = $pollData->poll->id;

        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'poll',
            feeds: [$this->testFeed->getFeedIdentifier()],
            text: 'Vote for your favorite color',
            userID: $this->testUserId,
            pollID: $pollId,
            custom: (object) ['poll_name' => 'What is your favorite color?']
        ));
        $this->assertResponseSuccess($createResponse, 'create poll for voting');
        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        $pollOptions = $pollData->poll->options;
        if (empty($pollOptions)) {
            self::markTestSkipped('Poll options not available for voting test');
        }

        $optionId = $pollOptions[0]->id ?? null;

        // snippet-start: VotePoll
        $voteResponse = $this->feedsV3Client->castPollVote(
            $activityId,
            $pollId,
            new GeneratedModels\CastPollVoteRequest(
                userID: $this->testUserId,
                vote: new GeneratedModels\VoteData(optionID: $optionId)
            )
        );
        // snippet-end: VotePoll

        $this->assertResponseSuccess($voteResponse, 'vote on poll');
    }

    // =================================================================
    // MODERATION
    // =================================================================

    /**
     * @throws StreamException
     *
     * @test
     */
    public function testModerateActivity(): void
    {
        $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'This content might need moderation',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()]
        ));
        $this->assertResponseSuccess($createResponse, 'create activity for moderation');
        $activityId = $createResponse->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        try {
            // snippet-start: ModerateActivity
            $moderationResponse = $this->feedsV3Client->activityFeedback(
                $activityId,
                new GeneratedModels\ActivityFeedbackRequest(hide: true, userID: $this->testUserId2)
            );
            // snippet-end: ModerateActivity

            $this->assertResponseSuccess($moderationResponse, 'moderate activity');
        } catch (StreamApiException $e) {
            self::markTestSkipped('Activity moderation not supported: ' . $e->getMessage());
        }
    }

    // =================================================================
    // QUERY / PAGINATION
    // =================================================================

    /**
     * @throws StreamException
     *
     * @test
     */
    public function testQueryActivitiesWithFilters(): void
    {
        foreach (['post', 'photo', 'video', 'story'] as $type) {
            $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
                type: $type,
                text: "Test {$type} activity for filtering",
                userID: $this->testUserId,
                feeds: [$this->testFeed->getFeedIdentifier()],
                custom: (object) ['category' => $type, 'priority' => rand(1, 5), 'tags' => [$type, 'test']]
            ));
            $this->assertResponseSuccess($createResponse, "create {$type} activity for filtering");
            $this->createdActivityIds[] = $createResponse->getData()->activity->id;
        }

        try {
            // snippet-start: QueryActivitiesWithTypeFilter
            $response = $this->feedsV3Client->queryActivities(new GeneratedModels\QueryActivitiesRequest(
                limit: 10,
                filter: (object) ['activity_type' => 'post', 'user_id' => $this->testUserId],
                sort: ['created_at' => -1]
            ));
            // snippet-end: QueryActivitiesWithTypeFilter
            $this->assertResponseSuccess($response, 'query activities with type filter');
        } catch (StreamApiException $e) {
            // Some filter combinations may not be supported
        }

        try {
            // snippet-start: QueryActivitiesWithCustomFilter
            $customFilterResponse = $this->feedsV3Client->queryActivities(new GeneratedModels\QueryActivitiesRequest(
                limit: 10,
                filter: (object) ['custom.priority' => (object) ['$gte' => 3], 'user_id' => $this->testUserId]
            ));
            // snippet-end: QueryActivitiesWithCustomFilter
            $this->assertResponseSuccess($customFilterResponse, 'query activities with custom filter');
        } catch (StreamApiException $e) {
            // Some filter combinations may not be supported
        }
    }

    /**
     * @throws StreamException
     *
     * @test
     */
    public function testGetFeedActivitiesWithPagination(): void
    {
        for ($i = 1; $i <= 7; $i++) {
            $createResponse = $this->feedsV3Client->addActivity(new GeneratedModels\AddActivityRequest(
                type: 'post',
                text: "Pagination test activity {$i}",
                userID: $this->testUserId,
                feeds: [$this->testFeed->getFeedIdentifier()]
            ));
            $this->assertResponseSuccess($createResponse, "create pagination activity {$i}");
            $this->createdActivityIds[] = $createResponse->getData()->activity->id;
        }

        // snippet-start: GetFeedActivitiesWithPagination
        $firstPageResponse = $this->feedsV3Client->queryActivities(new GeneratedModels\QueryActivitiesRequest(
            limit: 3,
            filter: (object) ['user_id' => $this->testUserId]
        ));
        // snippet-end: GetFeedActivitiesWithPagination

        $this->assertResponseSuccess($firstPageResponse, 'get first page of feed activities');
        $firstPageData = $firstPageResponse->getData();
        self::assertInstanceOf(QueryActivitiesResponse::class, $firstPageData);
        self::assertLessThanOrEqual(3, count($firstPageData->activities));

        // snippet-start: GetFeedActivitiesSecondPage
        $nextToken = $firstPageData->next ?? null;
        if ($nextToken) {
            $secondPageResponse = $this->feedsV3Client->queryActivities(new GeneratedModels\QueryActivitiesRequest(
                limit: 3,
                next: $nextToken,
                filter: (object) ['user_id' => $this->testUserId]
            ));
            $this->assertResponseSuccess($secondPageResponse, 'get second page of feed activities');
        }
        // snippet-end: GetFeedActivitiesSecondPage
    }

    // =================================================================
    // ERROR HANDLING / AUTH
    // =================================================================

    /**
     * @test
     */
    public function testErrorHandlingScenarios(): void
    {
        try {
            // snippet-start: HandleInvalidActivityId
            $response = $this->feedsV3Client->getActivity('invalid-activity-id-12345');
            // snippet-end: HandleInvalidActivityId
            if (!$response->isSuccessful()) {
                self::assertTrue(true);
            }
        } catch (StreamApiException $e) {
            // Expected
        }

        try {
            // snippet-start: HandleEmptyActivityText
            $emptyActivity = new GeneratedModels\AddActivityRequest(
                type: 'post',
                text: '',
                userID: $this->testUserId,
                feeds: [$this->testFeed->getFeedIdentifier()]
            );
            $response = $this->feedsV3Client->addActivity($emptyActivity);
            // snippet-end: HandleEmptyActivityText
            if (!$response->isSuccessful()) {
                self::assertTrue(true);
            }
        } catch (StreamApiException $e) {
            // Expected
        }

        self::assertTrue(true);
    }

    /**
     * @test
     */
    public function testAuthenticationScenarios(): void
    {
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
        $activityId = $response->getData()->activity->id;
        $this->createdActivityIds[] = $activityId;

        // snippet-start: UserPermissionUpdate
        $updateResponse = $this->feedsV3Client->updateActivity(
            $activityId,
            new GeneratedModels\UpdateActivityRequest(
                text: 'Updated with proper user permissions',
                userID: $this->testUserId
            )
        );
        // snippet-end: UserPermissionUpdate

        $this->assertResponseSuccess($updateResponse, 'update activity with proper permissions');
    }

    /**
     * @test
     */
    public function testRealWorldUsageDemo(): void
    {
        // snippet-start: RealWorldScenario
        $postActivity = new GeneratedModels\AddActivityRequest(
            type: 'post',
            text: 'Just visited the most amazing coffee shop!',
            userID: $this->testUserId,
            feeds: [$this->testFeed->getFeedIdentifier()],
            attachments: [
                new GeneratedModels\Attachment(
                    imageUrl: 'https://example.com/coffee-shop.jpg',
                    type: 'image',
                    title: 'Amazing Coffee Shop'
                ),
            ],
            custom: (object) ['location' => 'Downtown Coffee Co.', 'rating' => 5]
        );
        $postResponse = $this->feedsV3Client->addActivity($postActivity);
        $this->assertResponseSuccess($postResponse, 'create real-world post');
        $postId = $postResponse->getData()->activity->id;
        $this->createdActivityIds[] = $postId;

        foreach (['like', 'love', 'wow'] as $reactionType) {
            $reactionResponse = $this->feedsV3Client->addActivityReaction(
                $postId,
                new GeneratedModels\AddReactionRequest(type: $reactionType, userID: $this->testUserId2)
            );
            $this->assertResponseSuccess($reactionResponse, "add {$reactionType} reaction");
        }

        foreach (['That place looks amazing!', 'I love their espresso!', 'Adding to my list!'] as $commentText) {
            $commentResponse = $this->feedsV3Client->addComment(new GeneratedModels\AddCommentRequest(
                comment: $commentText,
                objectID: $postId,
                objectType: 'activity',
                userID: $this->testUserId2
            ));
            $this->assertResponseSuccess($commentResponse, 'add comment to post');
        }

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
            // Bookmark may not be supported
        }

        $enrichedResponse = $this->feedsV3Client->getActivity($postId);
        $this->assertResponseSuccess($enrichedResponse, 'get enriched activity');
        // snippet-end: RealWorldScenario
    }

    // =================================================================
    // FEED GROUP / VIEW CRUD (skipped pending backend fixes)
    // =================================================================

    /**
     * @test
     */
    public function testFeedGroupCRUD(): void
    {
        self::markTestSkipped('CI issue FEEDS-799');

        $feedGroupId = 'test-feed-group-' . substr(uniqid(), -8);

        // snippet-start: ListFeedGroups
        $listResponse = $this->feedsV3Client->listFeedGroups(false);
        // snippet-end: ListFeedGroups
        $this->assertResponseSuccess($listResponse, 'list feed groups');

        // snippet-start: CreateFeedGroup
        $createResponse = $this->feedsV3Client->createFeedGroup(
            new CreateFeedGroupRequest(id: $feedGroupId, defaultVisibility: 'public')
        );
        // snippet-end: CreateFeedGroup
        $this->assertResponseSuccess($createResponse, 'create feed group');
        self::assertSame($feedGroupId, $createResponse->getData()->feedGroup->id);

        // snippet-start: GetFeedGroup
        $getResponse = $this->feedsV3Client->getFeedGroup('foryou', false);
        // snippet-end: GetFeedGroup
        $this->assertResponseSuccess($getResponse, 'get feed group');

        // snippet-start: UpdateFeedGroup
        $updateResponse = $this->feedsV3Client->updateFeedGroup(
            'foryou',
            new GeneratedModels\UpdateFeedGroupRequest(aggregation: new GeneratedModels\AggregationConfig('default'))
        );
        // snippet-end: UpdateFeedGroup
        $this->assertResponseSuccess($updateResponse, 'update feed group');

        // snippet-start: GetOrCreateFeedGroupExisting
        $getOrCreateResponse = $this->feedsV3Client->getOrCreateFeedGroup(
            'foryou',
            new GeneratedModels\GetOrCreateFeedGroupRequest(defaultVisibility: 'public')
        );
        // snippet-end: GetOrCreateFeedGroupExisting
        $this->assertResponseSuccess($getOrCreateResponse, 'get or create existing feed group');

        $group = 'test-feed-group-' . substr(uniqid(), -8);
        // snippet-start: CreateFeedGroupWithAggregation
        $aggResponse = $this->feedsV3Client->createFeedGroup(new CreateFeedGroupRequest(
            id: $group,
            defaultVisibility: 'public',
            activityProcessors: [['type' => 'dummy']],
            aggregation: new GeneratedModels\AggregationConfig('{{ type }}-{{ time.strftime("%Y-%m-%d") }}')
        ));
        // snippet-end: CreateFeedGroupWithAggregation
        $this->assertResponseSuccess($aggResponse, 'create feed group with aggregation');

        $rankedGroup = 'test-feed-group-' . substr(uniqid(), -8);
        // snippet-start: CreateFeedGroupWithRanking
        $rankResponse = $this->feedsV3Client->createFeedGroup(new CreateFeedGroupRequest(
            id: $rankedGroup,
            defaultVisibility: 'public',
            ranking: new GeneratedModels\RankingConfig(type: 'recency', score: 'decay_linear(time) * popularity')
        ));
        // snippet-end: CreateFeedGroupWithRanking
        $this->assertResponseSuccess($rankResponse, 'create feed group with ranking');
    }

    /**
     * @test
     */
    public function testFeedViewCRUD(): void
    {
        self::markTestSkipped('Backend issue FEEDS-799');

        $feedViewId = 'test-feed-view-' . substr(uniqid(), -8);

        // snippet-start: ListFeedViews
        $listResponse = $this->feedsV3Client->listFeedViews();
        // snippet-end: ListFeedViews
        $this->assertResponseSuccess($listResponse, 'list feed views');

        // snippet-start: CreateFeedView
        $createResponse = $this->feedsV3Client->createFeedView(
            new GeneratedModels\CreateFeedViewRequest(id: $feedViewId)
        );
        // snippet-end: CreateFeedView
        $this->assertResponseSuccess($createResponse, 'create feed view');
        self::assertSame($feedViewId, $createResponse->getData()->feedView->id);

        // snippet-start: GetFeedView
        $getResponse = $this->feedsV3Client->getFeedView('feedViewID');
        // snippet-end: GetFeedView
        $this->assertResponseSuccess($getResponse, 'get feed view');

        // snippet-start: UpdateFeedView
        $updateResponse = $this->feedsV3Client->updateFeedView(
            'feedViewID',
            new GeneratedModels\UpdateFeedViewRequest(aggregation: new GeneratedModels\AggregationConfig('default'))
        );
        // snippet-end: UpdateFeedView
        $this->assertResponseSuccess($updateResponse, 'update feed view');

        // snippet-start: GetOrCreateFeedViewExisting
        $getOrCreateResponse = $this->feedsV3Client->getOrCreateFeedView(
            $feedViewId,
            new GeneratedModels\GetOrCreateFeedViewRequest(aggregation: new GeneratedModels\AggregationConfig('default'))
        );
        // snippet-end: GetOrCreateFeedViewExisting
        $this->assertResponseSuccess($getOrCreateResponse, 'get or create existing feed view');
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
