<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FollowResponse extends BaseModel
{
    public function __construct(
        public ?FeedResponse $sourceFeed = null,
        public ?FeedResponse $targetFeed = null,
        public ?string $pushPreference = null, // Push preference for notifications. One of: all, none
        public ?object $custom = null, // Custom data for the follow relationship
        public ?\DateTime $requestAcceptedAt = null, // When the follow request was accepted
        public ?\DateTime $requestRejectedAt = null, // When the follow request was rejected
        public ?string $status = null, // Status of the follow relationship. One of: accepted, pending, rejected
        public ?string $followerRole = null, // Role of the follower (source user) in the follow relationship
        public ?\DateTime $createdAt = null, // When the follow relationship was created
        public ?\DateTime $updatedAt = null, // When the follow relationship was last updated
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
