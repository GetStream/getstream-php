<?php

namespace GetStream\Generated;

use GetStream\StreamResponse;
use GetStream\Exceptions\StreamException;

/**
 * Generated Feed methods from OpenAPI specification
 * 
 * This trait contains auto-generated feed-related methods.
 * Include this trait in your Feed class to add these methods.
 */
trait FeedMethods
{
    /**
     * Delete a single feed by its ID
     * 
     *
     * @param bool|null $hardDelete
     * @return StreamResponse
     * @throws StreamException
     */
    public function deleteFeed(
        bool $hardDelete, ): StreamResponse {
        return $this->feedsV3Client->deleteFeed($this->feedGroup, $this->feedId,$hardDelete);
    }
    /**
     * Create a single feed for a given feed group
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function getOrCreateFeed(
        array $requestData = []): StreamResponse {
        return $this->feedsV3Client->getOrCreateFeed($this->feedGroup, $this->feedId, $requestData);
    }
    /**
     * Update an existing feed
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateFeed(
        array $requestData = []): StreamResponse {
        return $this->feedsV3Client->updateFeed($this->feedGroup, $this->feedId, $requestData);
    }
    /**
     * Mark activities as read/seen/watched. Can mark by timestamp (seen), activity IDs (read), or all as read.
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function markActivity(
        array $requestData = []): StreamResponse {
        return $this->feedsV3Client->markActivity($this->feedGroup, $this->feedId, $requestData);
    }
    /**
     * Unpin an activity from a feed. This removes the pin, so the activity will no longer be displayed at the top of the feed.
     * 
     *
     * @param string $activityID
     * @param string|null $userID
     * @return StreamResponse
     * @throws StreamException
     */
    public function unpinActivity(
        string $activityID, string $userID, ): StreamResponse {
        return $this->feedsV3Client->unpinActivity($this->feedGroup, $this->feedId, $activityID,$userID);
    }
    /**
     * Pin an activity to a feed. Pinned activities are typically displayed at the top of a feed.
     * 
     *
     * @param string $activityID
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function pinActivity(
        string $activityID, array $requestData = []): StreamResponse {
        return $this->feedsV3Client->pinActivity($this->feedGroup, $this->feedId, $activityID, $requestData);
    }
    /**
     * Add, remove, or set members for a feed
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function updateFeedMembers(
        array $requestData = []): StreamResponse {
        return $this->feedsV3Client->updateFeedMembers($this->feedGroup, $this->feedId, $requestData);
    }
    /**
     * Accepts a pending feed member request
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function acceptFeedMemberInvite(
        array $requestData = []): StreamResponse {
        return $this->feedsV3Client->acceptFeedMemberInvite($this->feedGroup, $this->feedId, $requestData);
    }
    /**
     * Query feed members based on filters with pagination and sorting options
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function queryFeedMembers(
        array $requestData = []): StreamResponse {
        return $this->feedsV3Client->queryFeedMembers($this->feedGroup, $this->feedId, $requestData);
    }
    /**
     * Rejects a pending feed member request
     * 
     *
     * @param array $requestData Request data
     * @return StreamResponse
     * @throws StreamException
     */
    public function rejectFeedMemberInvite(
        array $requestData = []): StreamResponse {
        return $this->feedsV3Client->rejectFeedMemberInvite($this->feedGroup, $this->feedId, $requestData);
    }
}


// Helper templates for parameter signatures and calls in php


