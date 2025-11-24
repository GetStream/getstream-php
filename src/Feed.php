<?php

declare(strict_types=1);

namespace GetStream;

use GetStream\Exceptions\StreamException;
use GetStream\Generated\FeedMethods;

/**
 * Represents a GetStream feed.
 */
class Feed
{
    use FeedMethods;
    private FeedsV3Client $feedsV3Client;

    private string $feedGroup;
    private string $feedId;

    /**
     * Create a new Feed instance.
     *
     * @param FeedsV3Client $feedsV3Client The FeedsV3 client
     * @param string        $feedGroup     The feed group
     * @param string        $feedId        The feed ID
     */
    public function __construct(FeedsV3Client $feedsV3Client, string $feedGroup, string $feedId)
    {
        if (empty($feedGroup)) {
            throw new StreamException('Feed group cannot be empty');
        }

        if (empty($feedId)) {
            throw new StreamException('Feed ID cannot be empty');
        }

        $this->feedsV3Client = $feedsV3Client;
        $this->feedGroup = $feedGroup;
        $this->feedId = $feedId;
    }

    /**
     * @throws StreamException
     */
    public function feed(string $feedGroup, string $feedId): self
    {
        return new self($this->feedsV3Client, $feedGroup, $feedId);
    }// $$

    /**
     * Get the feed group.
     */
    public function getFeedGroup(): string
    {
        return $this->feedGroup;
    }

    /**
     * Get the feed ID.
     */
    public function getFeedId(): string
    {
        return $this->feedId;
    }

    /**
     * Get the full feed identifier (feedGroup:feedId).
     */
    public function getFeedIdentifier(): string
    {
        return $this->feedGroup . ':' . $this->feedId;
    }
}
