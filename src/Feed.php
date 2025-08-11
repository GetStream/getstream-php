<?php

declare(strict_types=1);

namespace GetStream;

use GetStream\Exceptions\StreamException;

/**
 * Represents a GetStream feed
 */
class Feed
{
    private Client $client;
    private string $feedGroup;
    private string $feedId;

    /**
     * Create a new Feed instance
     *
     * @param Client $client The GetStream client
     * @param string $feedGroup The feed group
     * @param string $feedId The feed ID
     */
    public function __construct(Client $client, string $feedGroup, string $feedId)
    {
        if (empty($feedGroup)) {
            throw new StreamException('Feed group cannot be empty');
        }
        
        if (empty($feedId)) {
            throw new StreamException('Feed ID cannot be empty');
        }

        $this->client = $client;
        $this->feedGroup = $feedGroup;
        $this->feedId = $feedId;
    }

    /**
     * Get the feed group
     */
    public function getFeedGroup(): string
    {
        return $this->feedGroup;
    }

    /**
     * Get the feed ID
     */
    public function getFeedId(): string
    {
        return $this->feedId;
    }

    /**
     * Get the full feed identifier (feedGroup:feedId)
     */
    public function getFeedIdentifier(): string
    {
        return $this->feedGroup . ':' . $this->feedId;
    }

    /**
     * Get the client instance
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Add an activity to this feed
     *
     * @param array $activity The activity data
     * @return StreamResponse
     * @throws StreamException
     */
    public function addActivity(array $activity): StreamResponse
    {
        $path = '/api/v1.0/feed/{feedGroup}/{feedId}/';
        $pathParams = [
            'feedGroup' => $this->feedGroup,
            'feedId' => $this->feedId,
        ];

        return $this->client->makeRequest('POST', $path, [], $activity, $pathParams);
    }

    /**
     * Add multiple activities to this feed
     *
     * @param array[] $activities Array of activity data
     * @return StreamResponse
     * @throws StreamException
     */
    public function addActivities(array $activities): StreamResponse
    {
        $path = '/api/v1.0/feed/{feedGroup}/{feedId}/';
        $pathParams = [
            'feedGroup' => $this->feedGroup,
            'feedId' => $this->feedId,
        ];

        return $this->client->makeRequest('POST', $path, [], ['activities' => $activities], $pathParams);
    }

    /**
     * Get activities from this feed
     *
     * @param array $options Query options (limit, offset, etc.)
     * @return StreamResponse
     * @throws StreamException
     */
    public function getActivities(array $options = []): StreamResponse
    {
        $path = '/api/v1.0/feed/{feedGroup}/{feedId}/';
        $pathParams = [
            'feedGroup' => $this->feedGroup,
            'feedId' => $this->feedId,
        ];

        return $this->client->makeRequest('GET', $path, $options, null, $pathParams);
    }

    /**
     * Remove an activity from this feed by ID
     *
     * @param string $activityId The activity ID to remove
     * @return StreamResponse
     * @throws StreamException
     */
    public function removeActivity(string $activityId): StreamResponse
    {
        $path = '/api/v1.0/feed/{feedGroup}/{feedId}/{activityId}/';
        $pathParams = [
            'feedGroup' => $this->feedGroup,
            'feedId' => $this->feedId,
            'activityId' => $activityId,
        ];

        return $this->client->makeRequest('DELETE', $path, [], null, $pathParams);
    }

    /**
     * Follow another feed
     *
     * @param string $targetFeedGroup The target feed group to follow
     * @param string $targetFeedId The target feed ID to follow
     * @param int $activityCopyLimit Number of activities to copy (default: 300)
     * @return StreamResponse
     * @throws StreamException
     */
    public function follow(string $targetFeedGroup, string $targetFeedId, int $activityCopyLimit = 300): StreamResponse
    {
        $path = '/api/v1.0/feed/{feedGroup}/{feedId}/follows/';
        $pathParams = [
            'feedGroup' => $this->feedGroup,
            'feedId' => $this->feedId,
        ];

        $body = [
            'target' => $targetFeedGroup . ':' . $targetFeedId,
            'activity_copy_limit' => $activityCopyLimit,
        ];

        return $this->client->makeRequest('POST', $path, [], $body, $pathParams);
    }

    /**
     * Unfollow a feed
     *
     * @param string $targetFeedGroup The target feed group to unfollow
     * @param string $targetFeedId The target feed ID to unfollow
     * @return StreamResponse
     * @throws StreamException
     */
    public function unfollow(string $targetFeedGroup, string $targetFeedId): StreamResponse
    {
        $path = '/api/v1.0/feed/{feedGroup}/{feedId}/follows/{targetFeedGroup}:{targetFeedId}/';
        $pathParams = [
            'feedGroup' => $this->feedGroup,
            'feedId' => $this->feedId,
            'targetFeedGroup' => $targetFeedGroup,
            'targetFeedId' => $targetFeedId,
        ];

        return $this->client->makeRequest('DELETE', $path, [], null, $pathParams);
    }

    /**
     * Get the feeds that this feed is following
     *
     * @param array $options Query options (limit, offset, etc.)
     * @return StreamResponse
     * @throws StreamException
     */
    public function getFollowing(array $options = []): StreamResponse
    {
        $path = '/api/v1.0/feed/{feedGroup}/{feedId}/follows/';
        $pathParams = [
            'feedGroup' => $this->feedGroup,
            'feedId' => $this->feedId,
        ];

        return $this->client->makeRequest('GET', $path, $options, null, $pathParams);
    }

    /**
     * Get the feeds that are following this feed
     *
     * @param array $options Query options (limit, offset, etc.)
     * @return StreamResponse
     * @throws StreamException
     */
    public function getFollowers(array $options = []): StreamResponse
    {
        $path = '/api/v1.0/feed/{feedGroup}/{feedId}/followers/';
        $pathParams = [
            'feedGroup' => $this->feedGroup,
            'feedId' => $this->feedId,
        ];

        return $this->client->makeRequest('GET', $path, $options, null, $pathParams);
    }
}
