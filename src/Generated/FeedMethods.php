<?php

namespace GetStream\Generated;

use GetStream\StreamResponse;
use GetStream\Exceptions\StreamException;
use GetStream\GeneratedModels;

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
     * @param bool $hardDelete
     * @return StreamResponse<GeneratedModels\DeleteFeedResponse>
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
     * @param GeneratedModels\GetOrCreateFeedRequest $requestData
     * @return StreamResponse<GeneratedModels\GetOrCreateFeedResponse>
     * @throws StreamException
     */
    public function getOrCreateFeed(
        GeneratedModels\GetOrCreateFeedRequest $requestData): StreamResponse {
        return $this->feedsV3Client->getOrCreateFeed($this->feedGroup, $this->feedId, $requestData);
    }
    /**
     * Update an existing feed
     * 
     *
     * @param GeneratedModels\UpdateFeedRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateFeedResponse>
     * @throws StreamException
     */
    public function updateFeed(
        GeneratedModels\UpdateFeedRequest $requestData): StreamResponse {
        return $this->feedsV3Client->updateFeed($this->feedGroup, $this->feedId, $requestData);
    }
    /**
     * Mark activities as read/seen/watched. Can mark by timestamp (seen), activity IDs (read), or all as read.
     * 
     *
     * @param GeneratedModels\MarkActivityRequest $requestData
     * @return StreamResponse<GeneratedModels\Response>
     * @throws StreamException
     */
    public function markActivity(
        GeneratedModels\MarkActivityRequest $requestData): StreamResponse {
        return $this->feedsV3Client->markActivity($this->feedGroup, $this->feedId, $requestData);
    }
    /**
     * Unpin an activity from a feed. This removes the pin, so the activity will no longer be displayed at the top of the feed.
     * 
     *
     * @param string $activityID
     * @param string $userID
     * @return StreamResponse<GeneratedModels\UnpinActivityResponse>
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
     * @param GeneratedModels\PinActivityRequest $requestData
     * @return StreamResponse<GeneratedModels\PinActivityResponse>
     * @throws StreamException
     */
    public function pinActivity(
        string $activityID, GeneratedModels\PinActivityRequest $requestData): StreamResponse {
        return $this->feedsV3Client->pinActivity($this->feedGroup, $this->feedId, $activityID, $requestData);
    }
    /**
     * Add, remove, or set members for a feed
     * 
     *
     * @param GeneratedModels\UpdateFeedMembersRequest $requestData
     * @return StreamResponse<GeneratedModels\UpdateFeedMembersResponse>
     * @throws StreamException
     */
    public function updateFeedMembers(
        GeneratedModels\UpdateFeedMembersRequest $requestData): StreamResponse {
        return $this->feedsV3Client->updateFeedMembers($this->feedGroup, $this->feedId, $requestData);
    }
    /**
     * Accepts a pending feed member request
     * 
     *
     * @param GeneratedModels\AcceptFeedMemberInviteRequest $requestData
     * @return StreamResponse<GeneratedModels\AcceptFeedMemberInviteResponse>
     * @throws StreamException
     */
    public function acceptFeedMemberInvite(
        GeneratedModels\AcceptFeedMemberInviteRequest $requestData): StreamResponse {
        return $this->feedsV3Client->acceptFeedMemberInvite($this->feedGroup, $this->feedId, $requestData);
    }
    /**
     * Query feed members based on filters with pagination and sorting options
     * 
     *
     * @param GeneratedModels\QueryFeedMembersRequest $requestData
     * @return StreamResponse<GeneratedModels\QueryFeedMembersResponse>
     * @throws StreamException
     */
    public function queryFeedMembers(
        GeneratedModels\QueryFeedMembersRequest $requestData): StreamResponse {
        return $this->feedsV3Client->queryFeedMembers($this->feedGroup, $this->feedId, $requestData);
    }
    /**
     * Rejects a pending feed member request
     * 
     *
     * @param GeneratedModels\RejectFeedMemberInviteRequest $requestData
     * @return StreamResponse<GeneratedModels\RejectFeedMemberInviteResponse>
     * @throws StreamException
     */
    public function rejectFeedMemberInvite(
        GeneratedModels\RejectFeedMemberInviteRequest $requestData): StreamResponse {
        return $this->feedsV3Client->rejectFeedMemberInvite($this->feedGroup, $this->feedId, $requestData);
    }
}


// Helper templates for parameter signatures and calls in php


