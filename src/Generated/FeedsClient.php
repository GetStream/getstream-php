<?php

namespace GetStream\Generated;

use GetStream\StreamResponse;
use GetStream\Exceptions\StreamException;
use GetStream\GeneratedModels;

/**
 * Generated API methods for Stream Client
 * 
 * This trait contains auto-generated methods from the OpenAPI specification.
 * Include this trait in your Client class to add these methods.
 */
trait FeedsClient
{
    /**
     * Create a new activity or update an existing one
     * 
     *
     * @param GeneratedModels\AddActivityRequest $requestData
     * @return StreamResponse<GeneratedModels\AddActivityResponse>
     * @throws StreamException
     */
    public function addActivity(GeneratedModels\AddActivityRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/activities';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\AddActivityResponse::class);
    }
    /**
     * Create new activities or update existing ones in a batch operation
     * 
     *
     * @param GeneratedModels\UpsertActivitiesRequest $requestData
     * @return StreamResponse<GeneratedModels\UpsertActivitiesResponse>
     * @throws StreamException
     */
    public function upsertActivities(GeneratedModels\UpsertActivitiesRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/activities/batch';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UpsertActivitiesResponse::class);
    }
    /**
     * Delete one or more activities by their IDs
     * 
     *
     * @param GeneratedModels\DeleteActivitiesRequest $requestData
     * @return StreamResponse<GeneratedModels\DeleteActivitiesResponse>
     * @throws StreamException
     */
    public function deleteActivities(GeneratedModels\DeleteActivitiesRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/activities/delete';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\DeleteActivitiesResponse::class);
    }
    /**
     * Query activities based on filters with pagination and sorting options
     * 
     *
     * @param GeneratedModels\QueryActivitiesRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryActivitiesResponse>
     * @throws StreamException
     */
    public function queryActivities(GeneratedModels\QueryActivitiesRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/activities/query';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryActivitiesResponse::class);
    }
    /**
     * Deletes a bookmark from an activity
     * 
     *
     * @param string $activityID
     * @param string|null $folderID
     * @param string|null $userID
     * @return StreamResponse<GeneratedModels\DeleteBookmarkResponse>
     * @throws StreamException
     */
    public function deleteBookmark(string $activityID, ?string $folderID = null, ?string $userID = null): StreamResponse {
        $path = '/api/v2/feeds/activities/{activity_id}/bookmarks';
        $path = str_replace('{activity_id}', (string) $activityID, $path);

        $queryParams = [];
        if ($folderID !== null) {
            $queryParams['folder_id'] = $folderID;
        }
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteBookmarkResponse::class);
    }
    /**
     * Updates a bookmark for an activity
     * 
     *
     * @param string $activityID
     * @param GeneratedModels\UpdateBookmarkRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateBookmarkResponse>
     * @throws StreamException
     */
    public function updateBookmark(string $activityID, GeneratedModels\UpdateBookmarkRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/activities/{activity_id}/bookmarks';
        $path = str_replace('{activity_id}', (string) $activityID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\UpdateBookmarkResponse::class);
    }
    /**
     * Adds a bookmark to an activity
     * 
     *
     * @param string $activityID
     * @param GeneratedModels\AddBookmarkRequest $requestData
     * @return StreamResponse<GeneratedModels\AddBookmarkResponse>
     * @throws StreamException
     */
    public function addBookmark(string $activityID, GeneratedModels\AddBookmarkRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/activities/{activity_id}/bookmarks';
        $path = str_replace('{activity_id}', (string) $activityID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\AddBookmarkResponse::class);
    }
    /**
     * Submit feedback for an activity including options to show less, hide, report, or mute the user
     * 
     *
     * @param string $activityID
     * @param GeneratedModels\ActivityFeedbackRequest $requestData
     * @return StreamResponse<GeneratedModels\ActivityFeedbackResponse>
     * @throws StreamException
     */
    public function activityFeedback(string $activityID, GeneratedModels\ActivityFeedbackRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/activities/{activity_id}/feedback';
        $path = str_replace('{activity_id}', (string) $activityID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\ActivityFeedbackResponse::class);
    }
    /**
     * Cast a vote on a poll
     * 
     * Sends events:
     * - feeds.poll.vote_casted
     * - feeds.poll.vote_changed
     * - feeds.poll.vote_removed
     * - poll.vote_casted
     * - poll.vote_changed
     * - poll.vote_removed
     * 
     *
     * @param string $activityID
     * @param string $pollID
     * @param GeneratedModels\CastPollVoteRequest $requestData
     * @return StreamResponse<GeneratedModels\PollVoteResponse>
     * @throws StreamException
     */
    public function castPollVote(string $activityID, string $pollID, GeneratedModels\CastPollVoteRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/activities/{activity_id}/polls/{poll_id}/vote';
        $path = str_replace('{activity_id}', (string) $activityID, $path);
        $path = str_replace('{poll_id}', (string) $pollID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\PollVoteResponse::class);
    }
    /**
     * Delete a vote from a poll
     * 
     * Sends events:
     * - feeds.poll.vote_removed
     * - poll.vote_removed
     * 
     *
     * @param string $activityID
     * @param string $pollID
     * @param string $voteID
     * @param string|null $userID
     * @return StreamResponse<GeneratedModels\PollVoteResponse>
     * @throws StreamException
     */
    public function deletePollVote(string $activityID, string $pollID, string $voteID, ?string $userID = null): StreamResponse {
        $path = '/api/v2/feeds/activities/{activity_id}/polls/{poll_id}/vote/{vote_id}';
        $path = str_replace('{activity_id}', (string) $activityID, $path);
        $path = str_replace('{poll_id}', (string) $pollID, $path);
        $path = str_replace('{vote_id}', (string) $voteID, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\PollVoteResponse::class);
    }
    /**
     * Adds a reaction to an activity
     * 
     *
     * @param string $activityID
     * @param GeneratedModels\AddReactionRequest $requestData
     * @return StreamResponse<GeneratedModels\AddReactionResponse>
     * @throws StreamException
     */
    public function addReaction(string $activityID, GeneratedModels\AddReactionRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/activities/{activity_id}/reactions';
        $path = str_replace('{activity_id}', (string) $activityID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\AddReactionResponse::class);
    }
    /**
     * Query activity reactions
     * 
     *
     * @param string $activityID
     * @param GeneratedModels\QueryActivityReactionsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryActivityReactionsResponse>
     * @throws StreamException
     */
    public function queryActivityReactions(string $activityID, GeneratedModels\QueryActivityReactionsRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/activities/{activity_id}/reactions/query';
        $path = str_replace('{activity_id}', (string) $activityID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryActivityReactionsResponse::class);
    }
    /**
     * Removes a reaction from an activity
     * 
     *
     * @param string $activityID
     * @param string $type
     * @param string|null $userID
     * @return StreamResponse<GeneratedModels\DeleteActivityReactionResponse>
     * @throws StreamException
     */
    public function deleteActivityReaction(string $activityID, string $type, ?string $userID = null): StreamResponse {
        $path = '/api/v2/feeds/activities/{activity_id}/reactions/{type}';
        $path = str_replace('{activity_id}', (string) $activityID, $path);
        $path = str_replace('{type}', (string) $type, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteActivityReactionResponse::class);
    }
    /**
     * Delete a single activity by its ID
     * 
     *
     * @param string $id
     * @param bool|null $hardDelete
     * @return StreamResponse<GeneratedModels\DeleteActivityResponse>
     * @throws StreamException
     */
    public function deleteActivity(string $id, ?bool $hardDelete = null): StreamResponse {
        $path = '/api/v2/feeds/activities/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($hardDelete !== null) {
            $queryParams['hard_delete'] = $hardDelete;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteActivityResponse::class);
    }
    /**
     * Returns activity by ID
     * 
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\GetActivityResponse>
     * @throws StreamException
     */
    public function getActivity(string $id): StreamResponse {
        $path = '/api/v2/feeds/activities/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetActivityResponse::class);
    }
    /**
     * Updates certain fields of the activity
     * 
     * Sends events:
     * - feeds.activity.updated
     * 
     *
     * @param string $id
     * @param GeneratedModels\UpdateActivityPartialRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateActivityPartialResponse>
     * @throws StreamException
     */
    public function updateActivityPartial(string $id, GeneratedModels\UpdateActivityPartialRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/activities/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\UpdateActivityPartialResponse::class);
    }
    /**
     * Replaces an activity with the provided data
     * 
     * Sends events:
     * - feeds.activity.updated
     * 
     *
     * @param string $id
     * @param GeneratedModels\UpdateActivityRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateActivityResponse>
     * @throws StreamException
     */
    public function updateActivity(string $id, GeneratedModels\UpdateActivityRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/activities/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\UpdateActivityResponse::class);
    }
    /**
     * Query bookmark folders with filter query
     * 
     *
     * @param GeneratedModels\QueryBookmarkFoldersRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryBookmarkFoldersResponse>
     * @throws StreamException
     */
    public function queryBookmarkFolders(GeneratedModels\QueryBookmarkFoldersRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/bookmark_folders/query';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryBookmarkFoldersResponse::class);
    }
    /**
     * Delete a bookmark folder by its ID
     * 
     *
     * @param string $folderID
     * @return StreamResponse<GeneratedModels\DeleteBookmarkFolderResponse>
     * @throws StreamException
     */
    public function deleteBookmarkFolder(string $folderID): StreamResponse {
        $path = '/api/v2/feeds/bookmark_folders/{folder_id}';
        $path = str_replace('{folder_id}', (string) $folderID, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteBookmarkFolderResponse::class);
    }
    /**
     * Update a bookmark folder by its ID
     * 
     *
     * @param string $folderID
     * @param GeneratedModels\UpdateBookmarkFolderRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateBookmarkFolderResponse>
     * @throws StreamException
     */
    public function updateBookmarkFolder(string $folderID, GeneratedModels\UpdateBookmarkFolderRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/bookmark_folders/{folder_id}';
        $path = str_replace('{folder_id}', (string) $folderID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\UpdateBookmarkFolderResponse::class);
    }
    /**
     * Query bookmarks with filter query
     * 
     *
     * @param GeneratedModels\QueryBookmarksRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryBookmarksResponse>
     * @throws StreamException
     */
    public function queryBookmarks(GeneratedModels\QueryBookmarksRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/bookmarks/query';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryBookmarksResponse::class);
    }
    /**
     * Retrieve a threaded list of comments for a specific object (e.g., activity), with configurable depth, sorting, and pagination
     * 
     *
     * @param string|null $objectID
     * @param string|null $objectType
     * @param int|null $depth
     * @param string|null $sort
     * @param int|null $repliesLimit
     * @param int|null $limit
     * @param string|null $prev
     * @param string|null $next
     * @return StreamResponse<GeneratedModels\GetCommentsResponse>
     * @throws StreamException
     */
    public function getComments(?string $objectID = null, ?string $objectType = null, ?int $depth = null, ?string $sort = null, ?int $repliesLimit = null, ?int $limit = null, ?string $prev = null, ?string $next = null): StreamResponse {
        $path = '/api/v2/feeds/comments';

        $queryParams = [];
        if ($objectID !== null) {
            $queryParams['object_id'] = $objectID;
        }
        if ($objectType !== null) {
            $queryParams['object_type'] = $objectType;
        }
        if ($depth !== null) {
            $queryParams['depth'] = $depth;
        }
        if ($sort !== null) {
            $queryParams['sort'] = $sort;
        }
        if ($repliesLimit !== null) {
            $queryParams['replies_limit'] = $repliesLimit;
        }
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
        }
        if ($prev !== null) {
            $queryParams['prev'] = $prev;
        }
        if ($next !== null) {
            $queryParams['next'] = $next;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetCommentsResponse::class);
    }
    /**
     * Adds a comment to an object (e.g., activity) or a reply to an existing comment, and broadcasts appropriate events
     * 
     *
     * @param GeneratedModels\AddCommentRequest $requestData
     * @return StreamResponse<GeneratedModels\AddCommentResponse>
     * @throws StreamException
     */
    public function addComment(GeneratedModels\AddCommentRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/comments';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\AddCommentResponse::class);
    }
    /**
     * Adds multiple comments in a single request. Each comment must specify the object type and ID.
     * 
     *
     * @param GeneratedModels\AddCommentsBatchRequest $requestData
     * @return StreamResponse<GeneratedModels\AddCommentsBatchResponse>
     * @throws StreamException
     */
    public function addCommentsBatch(GeneratedModels\AddCommentsBatchRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/comments/batch';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\AddCommentsBatchResponse::class);
    }
    /**
     * Query comments using MongoDB-style filters with pagination and sorting options
     * 
     *
     * @param GeneratedModels\QueryCommentsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryCommentsResponse>
     * @throws StreamException
     */
    public function queryComments(GeneratedModels\QueryCommentsRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/comments/query';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryCommentsResponse::class);
    }
    /**
     * Deletes a comment from an object (e.g., activity) and broadcasts appropriate events
     * 
     *
     * @param string $id
     * @param bool|null $hardDelete
     * @return StreamResponse<GeneratedModels\DeleteCommentResponse>
     * @throws StreamException
     */
    public function deleteComment(string $id, ?bool $hardDelete = null): StreamResponse {
        $path = '/api/v2/feeds/comments/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($hardDelete !== null) {
            $queryParams['hard_delete'] = $hardDelete;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteCommentResponse::class);
    }
    /**
     * Get a comment by ID
     * 
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\GetCommentResponse>
     * @throws StreamException
     */
    public function getComment(string $id): StreamResponse {
        $path = '/api/v2/feeds/comments/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetCommentResponse::class);
    }
    /**
     * Updates a comment on an object (e.g., activity) and broadcasts appropriate events
     * 
     *
     * @param string $id
     * @param GeneratedModels\UpdateCommentRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateCommentResponse>
     * @throws StreamException
     */
    public function updateComment(string $id, GeneratedModels\UpdateCommentRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/comments/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\UpdateCommentResponse::class);
    }
    /**
     * Adds a reaction to a comment
     * 
     *
     * @param string $id
     * @param GeneratedModels\AddCommentReactionRequest $requestData
     * @return StreamResponse<GeneratedModels\AddCommentReactionResponse>
     * @throws StreamException
     */
    public function addCommentReaction(string $id, GeneratedModels\AddCommentReactionRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/comments/{id}/reactions';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\AddCommentReactionResponse::class);
    }
    /**
     * Query comment reactions
     * 
     *
     * @param string $id
     * @param GeneratedModels\QueryCommentReactionsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryCommentReactionsResponse>
     * @throws StreamException
     */
    public function queryCommentReactions(string $id, GeneratedModels\QueryCommentReactionsRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/comments/{id}/reactions/query';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryCommentReactionsResponse::class);
    }
    /**
     * Deletes a reaction from a comment
     * 
     *
     * @param string $id
     * @param string $type
     * @param string|null $userID
     * @return StreamResponse<GeneratedModels\DeleteCommentReactionResponse>
     * @throws StreamException
     */
    public function deleteCommentReaction(string $id, string $type, ?string $userID = null): StreamResponse {
        $path = '/api/v2/feeds/comments/{id}/reactions/{type}';
        $path = str_replace('{id}', (string) $id, $path);
        $path = str_replace('{type}', (string) $type, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteCommentReactionResponse::class);
    }
    /**
     * Retrieve a threaded list of replies for a single comment, with configurable depth, sorting, and pagination
     * 
     *
     * @param string $id
     * @param int|null $depth
     * @param string|null $sort
     * @param int|null $repliesLimit
     * @param int|null $limit
     * @param string|null $prev
     * @param string|null $next
     * @return StreamResponse<GeneratedModels\GetCommentRepliesResponse>
     * @throws StreamException
     */
    public function getCommentReplies(string $id, ?int $depth = null, ?string $sort = null, ?int $repliesLimit = null, ?int $limit = null, ?string $prev = null, ?string $next = null): StreamResponse {
        $path = '/api/v2/feeds/comments/{id}/replies';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($depth !== null) {
            $queryParams['depth'] = $depth;
        }
        if ($sort !== null) {
            $queryParams['sort'] = $sort;
        }
        if ($repliesLimit !== null) {
            $queryParams['replies_limit'] = $repliesLimit;
        }
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
        }
        if ($prev !== null) {
            $queryParams['prev'] = $prev;
        }
        if ($next !== null) {
            $queryParams['next'] = $next;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetCommentRepliesResponse::class);
    }
    /**
     * List all feed groups for the application
     * 
     *
     * @return StreamResponse<GeneratedModels\ListFeedGroupsResponse>
     * @throws StreamException
     */
    public function listFeedGroups(): StreamResponse {
        $path = '/api/v2/feeds/feed_groups';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListFeedGroupsResponse::class);
    }
    /**
     * Creates a new feed group with the specified configuration
     * 
     *
     * @param GeneratedModels\CreateFeedGroupRequest $requestData
     * @return StreamResponse<GeneratedModels\CreateFeedGroupResponse>
     * @throws StreamException
     */
    public function createFeedGroup(GeneratedModels\CreateFeedGroupRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feed_groups';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CreateFeedGroupResponse::class);
    }
    /**
     * Delete a single feed by its ID
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param bool|null $hardDelete
     * @return StreamResponse<GeneratedModels\DeleteFeedResponse>
     * @throws StreamException
     */
    public function deleteFeed(string $feedGroupID, string $feedID, ?bool $hardDelete = null): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);

        $queryParams = [];
        if ($hardDelete !== null) {
            $queryParams['hard_delete'] = $hardDelete;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteFeedResponse::class);
    }
    /**
     * Create a single feed for a given feed group
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param GeneratedModels\GetOrCreateFeedRequest $requestData
     * @return StreamResponse<GeneratedModels\GetOrCreateFeedResponse>
     * @throws StreamException
     */
    public function getOrCreateFeed(string $feedGroupID, string $feedID, GeneratedModels\GetOrCreateFeedRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\GetOrCreateFeedResponse::class);
    }
    /**
     * Update an existing feed
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param GeneratedModels\UpdateFeedRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateFeedResponse>
     * @throws StreamException
     */
    public function updateFeed(string $feedGroupID, string $feedID, GeneratedModels\UpdateFeedRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\UpdateFeedResponse::class);
    }
    /**
     * Mark activities as read/seen/watched. Can mark by timestamp (seen), activity IDs (read), or all as read.
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param GeneratedModels\MarkActivityRequest $requestData
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function markActivity(string $feedGroupID, string $feedID, GeneratedModels\MarkActivityRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}/activities/mark/batch';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Unpin an activity from a feed. This removes the pin, so the activity will no longer be displayed at the top of the feed.
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param string $activityID
     * @param string|null $userID
     * @return StreamResponse<GeneratedModels\UnpinActivityResponse>
     * @throws StreamException
     */
    public function unpinActivity(string $feedGroupID, string $feedID, string $activityID, ?string $userID = null): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}/activities/{activity_id}/pin';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);
        $path = str_replace('{activity_id}', (string) $activityID, $path);

        $queryParams = [];
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\UnpinActivityResponse::class);
    }
    /**
     * Pin an activity to a feed. Pinned activities are typically displayed at the top of a feed.
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param string $activityID
     * @param GeneratedModels\PinActivityRequest $requestData
     * @return StreamResponse<GeneratedModels\PinActivityResponse>
     * @throws StreamException
     */
    public function pinActivity(string $feedGroupID, string $feedID, string $activityID, GeneratedModels\PinActivityRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}/activities/{activity_id}/pin';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);
        $path = str_replace('{activity_id}', (string) $activityID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\PinActivityResponse::class);
    }
    /**
     * Add, remove, or set members for a feed
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param GeneratedModels\UpdateFeedMembersRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateFeedMembersResponse>
     * @throws StreamException
     */
    public function updateFeedMembers(string $feedGroupID, string $feedID, GeneratedModels\UpdateFeedMembersRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}/members';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\UpdateFeedMembersResponse::class);
    }
    /**
     * Accepts a pending feed member request
     * 
     *
     * @param string $feedID
     * @param string $feedGroupID
     * @param GeneratedModels\AcceptFeedMemberInviteRequest $requestData
     * @return StreamResponse<GeneratedModels\AcceptFeedMemberInviteResponse>
     * @throws StreamException
     */
    public function acceptFeedMemberInvite(string $feedID, string $feedGroupID, GeneratedModels\AcceptFeedMemberInviteRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}/members/accept';
        $path = str_replace('{feed_id}', (string) $feedID, $path);
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\AcceptFeedMemberInviteResponse::class);
    }
    /**
     * Query feed members based on filters with pagination and sorting options
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param GeneratedModels\QueryFeedMembersRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryFeedMembersResponse>
     * @throws StreamException
     */
    public function queryFeedMembers(string $feedGroupID, string $feedID, GeneratedModels\QueryFeedMembersRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}/members/query';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryFeedMembersResponse::class);
    }
    /**
     * Rejects a pending feed member request
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param GeneratedModels\RejectFeedMemberInviteRequest $requestData
     * @return StreamResponse<GeneratedModels\RejectFeedMemberInviteResponse>
     * @throws StreamException
     */
    public function rejectFeedMemberInvite(string $feedGroupID, string $feedID, GeneratedModels\RejectFeedMemberInviteRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}/members/reject';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\RejectFeedMemberInviteResponse::class);
    }
    /**
     * Get follow suggestions for a feed group
     * 
     *
     * @param string $feedGroupID
     * @param int|null $limit
     * @param string|null $userID
     * @return StreamResponse<GeneratedModels\GetFollowSuggestionsResponse>
     * @throws StreamException
     */
    public function getFollowSuggestions(string $feedGroupID, ?int $limit = null, ?string $userID = null): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/follow_suggestions';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);

        $queryParams = [];
        if ($limit !== null) {
            $queryParams['limit'] = $limit;
        }
        if ($userID !== null) {
            $queryParams['user_id'] = $userID;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetFollowSuggestionsResponse::class);
    }
    /**
     * Delete a feed group by its ID. Can perform a soft delete (default) or hard delete.
     * 
     *
     * @param string $id
     * @param bool|null $hardDelete
     * @return StreamResponse<GeneratedModels\DeleteFeedGroupResponse>
     * @throws StreamException
     */
    public function deleteFeedGroup(string $id, ?bool $hardDelete = null): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        if ($hardDelete !== null) {
            $queryParams['hard_delete'] = $hardDelete;
        }
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteFeedGroupResponse::class);
    }
    /**
     * Get a feed group by ID
     * 
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\GetFeedGroupResponse>
     * @throws StreamException
     */
    public function getFeedGroup(string $id): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetFeedGroupResponse::class);
    }
    /**
     * Get an existing feed group or create a new one if it doesn't exist
     * 
     *
     * @param string $id
     * @param GeneratedModels\GetOrCreateFeedGroupRequest $requestData
     * @return StreamResponse<GeneratedModels\GetOrCreateFeedGroupResponse>
     * @throws StreamException
     */
    public function getOrCreateFeedGroup(string $id, GeneratedModels\GetOrCreateFeedGroupRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\GetOrCreateFeedGroupResponse::class);
    }
    /**
     * Update a feed group by ID
     * 
     *
     * @param string $id
     * @param GeneratedModels\UpdateFeedGroupRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateFeedGroupResponse>
     * @throws StreamException
     */
    public function updateFeedGroup(string $id, GeneratedModels\UpdateFeedGroupRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\UpdateFeedGroupResponse::class);
    }
    /**
     * List all feed views for a feed group
     * 
     *
     * @return StreamResponse<GeneratedModels\ListFeedViewsResponse>
     * @throws StreamException
     */
    public function listFeedViews(): StreamResponse {
        $path = '/api/v2/feeds/feed_views';

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\ListFeedViewsResponse::class);
    }
    /**
     * Create a custom view for a feed group with specific selectors, ranking, or aggregation options
     * 
     *
     * @param GeneratedModels\CreateFeedViewRequest $requestData
     * @return StreamResponse<GeneratedModels\CreateFeedViewResponse>
     * @throws StreamException
     */
    public function createFeedView(GeneratedModels\CreateFeedViewRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feed_views';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CreateFeedViewResponse::class);
    }
    /**
     * Delete an existing custom feed view
     * 
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\DeleteFeedViewResponse>
     * @throws StreamException
     */
    public function deleteFeedView(string $id): StreamResponse {
        $path = '/api/v2/feeds/feed_views/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteFeedViewResponse::class);
    }
    /**
     * Get a feed view by its ID
     * 
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\GetFeedViewResponse>
     * @throws StreamException
     */
    public function getFeedView(string $id): StreamResponse {
        $path = '/api/v2/feeds/feed_views/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('GET', $path, $queryParams, $requestData), GeneratedModels\GetFeedViewResponse::class);
    }
    /**
     * Get an existing feed view or create a new one if it doesn't exist
     * 
     *
     * @param string $id
     * @param GeneratedModels\GetOrCreateFeedViewRequest $requestData
     * @return StreamResponse<GeneratedModels\GetOrCreateFeedViewResponse>
     * @throws StreamException
     */
    public function getOrCreateFeedView(string $id, GeneratedModels\GetOrCreateFeedViewRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feed_views/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\GetOrCreateFeedViewResponse::class);
    }
    /**
     * Update an existing custom feed view with new selectors, ranking, or aggregation options
     * 
     *
     * @param string $id
     * @param GeneratedModels\UpdateFeedViewRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateFeedViewResponse>
     * @throws StreamException
     */
    public function updateFeedView(string $id, GeneratedModels\UpdateFeedViewRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feed_views/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PUT', $path, $queryParams, $requestData), GeneratedModels\UpdateFeedViewResponse::class);
    }
    /**
     * Create multiple feeds at once for a given feed group
     * 
     *
     * @param GeneratedModels\CreateFeedsBatchRequest $requestData
     * @return StreamResponse<GeneratedModels\CreateFeedsBatchResponse>
     * @throws StreamException
     */
    public function createFeedsBatch(GeneratedModels\CreateFeedsBatchRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feeds/batch';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CreateFeedsBatchResponse::class);
    }
    /**
     * Query feeds with filter query
     * 
     *
     * @param GeneratedModels\QueryFeedsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryFeedsResponse>
     * @throws StreamException
     */
    public function queryFeeds(GeneratedModels\QueryFeedsRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/feeds/query';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryFeedsResponse::class);
    }
    /**
     * Updates a follow's custom data, push preference, and follower role. Source owner can update custom data and push preference. Target owner can update follower role.
     * 
     *
     * @param GeneratedModels\UpdateFollowRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateFollowResponse>
     * @throws StreamException
     */
    public function updateFollow(GeneratedModels\UpdateFollowRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/follows';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\UpdateFollowResponse::class);
    }
    /**
     * Creates a follow and broadcasts FollowAddedEvent
     * 
     *
     * @param GeneratedModels\FollowRequest $requestData
     * @return StreamResponse<GeneratedModels\SingleFollowResponse>
     * @throws StreamException
     */
    public function follow(GeneratedModels\FollowRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/follows';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\SingleFollowResponse::class);
    }
    /**
     * Accepts a pending follow request
     * 
     *
     * @param GeneratedModels\AcceptFollowRequest $requestData
     * @return StreamResponse<GeneratedModels\AcceptFollowResponse>
     * @throws StreamException
     */
    public function acceptFollow(GeneratedModels\AcceptFollowRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/follows/accept';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\AcceptFollowResponse::class);
    }
    /**
     * Creates multiple follows at once and broadcasts FollowAddedEvent for each follow
     * 
     *
     * @param GeneratedModels\FollowBatchRequest $requestData
     * @return StreamResponse<GeneratedModels\FollowBatchResponse>
     * @throws StreamException
     */
    public function followBatch(GeneratedModels\FollowBatchRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/follows/batch';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\FollowBatchResponse::class);
    }
    /**
     * Query follows based on filters with pagination and sorting options
     * 
     *
     * @param GeneratedModels\QueryFollowsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryFollowsResponse>
     * @throws StreamException
     */
    public function queryFollows(GeneratedModels\QueryFollowsRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/follows/query';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryFollowsResponse::class);
    }
    /**
     * Rejects a pending follow request
     * 
     *
     * @param GeneratedModels\RejectFollowRequest $requestData
     * @return StreamResponse<GeneratedModels\RejectFollowResponse>
     * @throws StreamException
     */
    public function rejectFollow(GeneratedModels\RejectFollowRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/follows/reject';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\RejectFollowResponse::class);
    }
    /**
     * Removes a follow and broadcasts FollowRemovedEvent
     * 
     *
     * @param string $source
     * @param string $target
     * @return StreamResponse<GeneratedModels\UnfollowResponse>
     * @throws StreamException
     */
    public function unfollow(string $source, string $target): StreamResponse {
        $path = '/api/v2/feeds/follows/{source}/{target}';
        $path = str_replace('{source}', (string) $source, $path);
        $path = str_replace('{target}', (string) $target, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\UnfollowResponse::class);
    }
    /**
     * Create a new membership level with tag-based access controls
     * 
     *
     * @param GeneratedModels\CreateMembershipLevelRequest $requestData
     * @return StreamResponse<GeneratedModels\CreateMembershipLevelResponse>
     * @throws StreamException
     */
    public function createMembershipLevel(GeneratedModels\CreateMembershipLevelRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/membership_levels';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\CreateMembershipLevelResponse::class);
    }
    /**
     * Query membership levels with filter query
     * 
     *
     * @param GeneratedModels\QueryMembershipLevelsRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryMembershipLevelsResponse>
     * @throws StreamException
     */
    public function queryMembershipLevels(GeneratedModels\QueryMembershipLevelsRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/membership_levels/query';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\QueryMembershipLevelsResponse::class);
    }
    /**
     * Delete a membership level by its UUID. This operation is irreversible.
     * 
     *
     * @param string $id
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function deleteMembershipLevel(string $id): StreamResponse {
        $path = '/api/v2/feeds/membership_levels/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\Response::class);
    }
    /**
     * Update a membership level with partial updates. Only specified fields will be updated.
     * 
     *
     * @param string $id
     * @param GeneratedModels\UpdateMembershipLevelRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateMembershipLevelResponse>
     * @throws StreamException
     */
    public function updateMembershipLevel(string $id, GeneratedModels\UpdateMembershipLevelRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/membership_levels/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('PATCH', $path, $queryParams, $requestData), GeneratedModels\UpdateMembershipLevelResponse::class);
    }
    /**
     * Removes multiple follows at once and broadcasts FollowRemovedEvent for each one
     * 
     *
     * @param GeneratedModels\UnfollowBatchRequest $requestData
     * @return StreamResponse<GeneratedModels\UnfollowBatchResponse>
     * @throws StreamException
     */
    public function unfollowBatch(GeneratedModels\UnfollowBatchRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/unfollow/batch';

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\UnfollowBatchResponse::class);
    }
    /**
     * Delete all activities, reactions, comments, and bookmarks for a user
     * 
     *
     * @param string $userID
     * @return StreamResponse<GeneratedModels\DeleteFeedUserDataResponse>
     * @throws StreamException
     */
    public function deleteFeedUserData(string $userID): StreamResponse {
        $path = '/api/v2/feeds/users/{user_id}/delete';
        $path = str_replace('{user_id}', (string) $userID, $path);

        $queryParams = [];
        $requestData = null;
        return StreamResponse::fromJson($this->makeRequest('DELETE', $path, $queryParams, $requestData), GeneratedModels\DeleteFeedUserDataResponse::class);
    }
    /**
     * Export all activities, reactions, comments, and bookmarks for a user
     * 
     *
     * @param string $userID
     * @param GeneratedModels\ExportFeedUserDataRequest $requestData
     * @return StreamResponse<GeneratedModels\ExportFeedUserDataResponse>
     * @throws StreamException
     */
    public function exportFeedUserData(string $userID, GeneratedModels\ExportFeedUserDataRequest $requestData): StreamResponse {
        $path = '/api/v2/feeds/users/{user_id}/export';
        $path = str_replace('{user_id}', (string) $userID, $path);

        $queryParams = [];
        // Use the provided request data array directly
        return StreamResponse::fromJson($this->makeRequest('POST', $path, $queryParams, $requestData), GeneratedModels\ExportFeedUserDataResponse::class);
    }
}
