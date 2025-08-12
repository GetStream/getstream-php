<?php

namespace GetStream\Generated;

use GetStream\StreamResponse;
use GetStream\Exceptions\StreamException;

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
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function addActivity(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/activities';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Create new activities or update existing ones in a batch operation
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function upsertActivities(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/activities/batch';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Delete one or more activities by their IDs
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function deleteActivities(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/activities/delete';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Query activities based on filters with pagination and sorting options
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function queryActivities(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/activities/query';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Deletes a bookmark from an activity
     * 
     *
     * @param string $activityID
     * @param string|null $folderID
     * @param string|null $userID
     * @return StreamResponse
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

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Updates a bookmark for an activity
     * 
     *
     * @param string $activityID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateBookmark(string $activityID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/activities/{activity_id}/bookmarks';
        $path = str_replace('{activity_id}', (string) $activityID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PATCH', $path, $queryParams, $requestData);
    }
    /**
     * Adds a bookmark to an activity
     * 
     *
     * @param string $activityID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function addBookmark(string $activityID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/activities/{activity_id}/bookmarks';
        $path = str_replace('{activity_id}', (string) $activityID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Submit feedback for an activity including options to show less, hide, report, or mute the user
     * 
     *
     * @param string $activityID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function activityFeedback(string $activityID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/activities/{activity_id}/feedback';
        $path = str_replace('{activity_id}', (string) $activityID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
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
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function castPollVote(string $activityID, string $pollID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/activities/{activity_id}/polls/{poll_id}/vote';
        $path = str_replace('{activity_id}', (string) $activityID, $path);
        $path = str_replace('{poll_id}', (string) $pollID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
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
     * @return StreamResponse
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

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Adds a reaction to an activity
     * 
     *
     * @param string $activityID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function addReaction(string $activityID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/activities/{activity_id}/reactions';
        $path = str_replace('{activity_id}', (string) $activityID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Query activity reactions
     * 
     *
     * @param string $activityID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function queryActivityReactions(string $activityID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/activities/{activity_id}/reactions/query';
        $path = str_replace('{activity_id}', (string) $activityID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Removes a reaction from an activity
     * 
     *
     * @param string $activityID
     * @param string $type
     * @param string|null $userID
     * @return StreamResponse
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

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Delete a single activity by its ID
     * 
     *
     * @param string $id
     * @param bool|null $hardDelete
     * @return StreamResponse
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

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Returns activity by ID
     * 
     *
     * @param string $id
     * @return StreamResponse
     * @throws StreamException
     */
    public function getActivity(string $id): StreamResponse {
        $path = '/api/v2/feeds/activities/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Updates certain fields of the activity
     * 
     * Sends events:
     * - feeds.activity.updated
     * 
     *
     * @param string $id
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateActivityPartial(string $id, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/activities/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PATCH', $path, $queryParams, $requestData);
    }
    /**
     * Replaces an activity with the provided data
     * 
     * Sends events:
     * - feeds.activity.updated
     * 
     *
     * @param string $id
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateActivity(string $id, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/activities/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PUT', $path, $queryParams, $requestData);
    }
    /**
     * Query bookmark folders with filter query
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function queryBookmarkFolders(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/bookmark_folders/query';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Delete a bookmark folder by its ID
     * 
     *
     * @param string $folderID
     * @return StreamResponse
     * @throws StreamException
     */
    public function deleteBookmarkFolder(string $folderID): StreamResponse {
        $path = '/api/v2/feeds/bookmark_folders/{folder_id}';
        $path = str_replace('{folder_id}', (string) $folderID, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Update a bookmark folder by its ID
     * 
     *
     * @param string $folderID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateBookmarkFolder(string $folderID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/bookmark_folders/{folder_id}';
        $path = str_replace('{folder_id}', (string) $folderID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PATCH', $path, $queryParams, $requestData);
    }
    /**
     * Query bookmarks with filter query
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function queryBookmarks(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/bookmarks/query';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
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
     * @return StreamResponse
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

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Adds a comment to an object (e.g., activity) or a reply to an existing comment, and broadcasts appropriate events
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function addComment(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/comments';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Adds multiple comments in a single request. Each comment must specify the object type and ID.
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function addCommentsBatch(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/comments/batch';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Query comments using MongoDB-style filters with pagination and sorting options
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function queryComments(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/comments/query';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Deletes a comment from an object (e.g., activity) and broadcasts appropriate events
     * 
     *
     * @param string $id
     * @param bool|null $hardDelete
     * @return StreamResponse
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

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Get a comment by ID
     * 
     *
     * @param string $id
     * @return StreamResponse
     * @throws StreamException
     */
    public function getComment(string $id): StreamResponse {
        $path = '/api/v2/feeds/comments/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Updates a comment on an object (e.g., activity) and broadcasts appropriate events
     * 
     *
     * @param string $id
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateComment(string $id, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/comments/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PATCH', $path, $queryParams, $requestData);
    }
    /**
     * Adds a reaction to a comment
     * 
     *
     * @param string $id
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function addCommentReaction(string $id, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/comments/{id}/reactions';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Query comment reactions
     * 
     *
     * @param string $id
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function queryCommentReactions(string $id, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/comments/{id}/reactions/query';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Deletes a reaction from a comment
     * 
     *
     * @param string $id
     * @param string $type
     * @param string|null $userID
     * @return StreamResponse
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

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
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
     * @return StreamResponse
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

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * List all feed groups for the application
     * 
     *
     * @return StreamResponse
     * @throws StreamException
     */
    public function listFeedGroups(): StreamResponse {
        $path = '/api/v2/feeds/feed_groups';

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Creates a new feed group with the specified configuration
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function createFeedGroup(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feed_groups';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Delete a single feed by its ID
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param bool|null $hardDelete
     * @return StreamResponse
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

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Create a single feed for a given feed group
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function getOrCreateFeed(string $feedGroupID, string $feedID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Update an existing feed
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateFeed(string $feedGroupID, string $feedID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PUT', $path, $queryParams, $requestData);
    }
    /**
     * Mark activities as read/seen/watched. Can mark by timestamp (seen), activity IDs (read), or all as read.
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function markActivity(string $feedGroupID, string $feedID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}/activities/mark/batch';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Unpin an activity from a feed. This removes the pin, so the activity will no longer be displayed at the top of the feed.
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param string $activityID
     * @param string|null $userID
     * @return StreamResponse
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

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Pin an activity to a feed. Pinned activities are typically displayed at the top of a feed.
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param string $activityID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function pinActivity(string $feedGroupID, string $feedID, string $activityID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}/activities/{activity_id}/pin';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);
        $path = str_replace('{activity_id}', (string) $activityID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Add, remove, or set members for a feed
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateFeedMembers(string $feedGroupID, string $feedID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}/members';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PATCH', $path, $queryParams, $requestData);
    }
    /**
     * Accepts a pending feed member request
     * 
     *
     * @param string $feedID
     * @param string $feedGroupID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function acceptFeedMemberInvite(string $feedID, string $feedGroupID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}/members/accept';
        $path = str_replace('{feed_id}', (string) $feedID, $path);
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Query feed members based on filters with pagination and sorting options
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function queryFeedMembers(string $feedGroupID, string $feedID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}/members/query';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Rejects a pending feed member request
     * 
     *
     * @param string $feedGroupID
     * @param string $feedID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function rejectFeedMemberInvite(string $feedGroupID, string $feedID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{feed_group_id}/feeds/{feed_id}/members/reject';
        $path = str_replace('{feed_group_id}', (string) $feedGroupID, $path);
        $path = str_replace('{feed_id}', (string) $feedID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Get follow suggestions for a feed group
     * 
     *
     * @param string $feedGroupID
     * @param int|null $limit
     * @param string|null $userID
     * @return StreamResponse
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

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Delete a feed group by its ID. Can perform a soft delete (default) or hard delete.
     * 
     *
     * @param string $id
     * @param bool|null $hardDelete
     * @return StreamResponse
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

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Get a feed group by ID
     * 
     *
     * @param string $id
     * @return StreamResponse
     * @throws StreamException
     */
    public function getFeedGroup(string $id): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Get an existing feed group or create a new one if it doesn't exist
     * 
     *
     * @param string $id
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function getOrCreateFeedGroup(string $id, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Update a feed group by ID
     * 
     *
     * @param string $id
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateFeedGroup(string $id, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feed_groups/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PUT', $path, $queryParams, $requestData);
    }
    /**
     * List all feed views for a feed group
     * 
     *
     * @return StreamResponse
     * @throws StreamException
     */
    public function listFeedViews(): StreamResponse {
        $path = '/api/v2/feeds/feed_views';

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Create a custom view for a feed group with specific selectors, ranking, or aggregation options
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function createFeedView(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feed_views';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Delete an existing custom feed view
     * 
     *
     * @param string $id
     * @return StreamResponse
     * @throws StreamException
     */
    public function deleteFeedView(string $id): StreamResponse {
        $path = '/api/v2/feeds/feed_views/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Get a feed view by its ID
     * 
     *
     * @param string $id
     * @return StreamResponse
     * @throws StreamException
     */
    public function getFeedView(string $id): StreamResponse {
        $path = '/api/v2/feeds/feed_views/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('GET', $path, $queryParams, $requestData);
    }
    /**
     * Get an existing feed view or create a new one if it doesn't exist
     * 
     *
     * @param string $id
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function getOrCreateFeedView(string $id, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feed_views/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Update an existing custom feed view with new selectors, ranking, or aggregation options
     * 
     *
     * @param string $id
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateFeedView(string $id, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feed_views/{id}';
        $path = str_replace('{id}', (string) $id, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PUT', $path, $queryParams, $requestData);
    }
    /**
     * Create multiple feeds at once for a given feed group
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function createFeedsBatch(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feeds/batch';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Query feeds with filter query
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function queryFeeds(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/feeds/query';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Updates a follow's custom data, push preference, and follower role. Source owner can update custom data and push preference. Target owner can update follower role.
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateFollow(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/follows';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('PATCH', $path, $queryParams, $requestData);
    }
    /**
     * Creates a follow and broadcasts FollowAddedEvent
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function follow(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/follows';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Accepts a pending follow request
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function acceptFollow(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/follows/accept';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Creates multiple follows at once and broadcasts FollowAddedEvent for each follow
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function followBatch(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/follows/batch';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Query follows based on filters with pagination and sorting options
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function queryFollows(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/follows/query';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Rejects a pending follow request
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function rejectFollow(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/follows/reject';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Removes a follow and broadcasts FollowRemovedEvent
     * 
     *
     * @param string $source
     * @param string $target
     * @return StreamResponse
     * @throws StreamException
     */
    public function unfollow(string $source, string $target): StreamResponse {
        $path = '/api/v2/feeds/follows/{source}/{target}';
        $path = str_replace('{source}', (string) $source, $path);
        $path = str_replace('{target}', (string) $target, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Removes multiple follows at once and broadcasts FollowRemovedEvent for each one
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function unfollowBatch(array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/unfollow/batch';

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
    /**
     * Delete all activities, reactions, comments, and bookmarks for a user
     * 
     *
     * @param string $userID
     * @return StreamResponse
     * @throws StreamException
     */
    public function deleteFeedUserData(string $userID): StreamResponse {
        $path = '/api/v2/feeds/users/{user_id}/delete';
        $path = str_replace('{user_id}', (string) $userID, $path);

        $queryParams = [];
        $requestData = null;

        return $this->makeRequest('DELETE', $path, $queryParams, $requestData);
    }
    /**
     * Export all activities, reactions, comments, and bookmarks for a user
     * 
     *
     * @param string $userID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function exportFeedUserData(string $userID, array $requestData = []): StreamResponse {
        $path = '/api/v2/feeds/users/{user_id}/export';
        $path = str_replace('{user_id}', (string) $userID, $path);

        $queryParams = [];
        // Use the provided request data array directly

        return $this->makeRequest('POST', $path, $queryParams, $requestData);
    }
}
