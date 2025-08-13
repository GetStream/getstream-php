<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FollowResponse implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $followerRole = null,
        public ?string $pushPreference = null,
        public ?string $status = null,
        public ?\DateTime $updatedAt = null,
        public ?FeedResponse $sourceFeed = null,
        public ?FeedResponse $targetFeed = null,
        public ?\DateTime $requestAcceptedAt = null,
        public ?\DateTime $requestRejectedAt = null,
        public ?object $custom = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'follower_role' => $this->followerRole,
            'push_preference' => $this->pushPreference,
            'status' => $this->status,
            'updated_at' => $this->updatedAt,
            'source_feed' => $this->sourceFeed,
            'target_feed' => $this->targetFeed,
            'request_accepted_at' => $this->requestAcceptedAt,
            'request_rejected_at' => $this->requestRejectedAt,
            'custom' => $this->custom,
        ], fn($v) => $v !== null);
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }

    /**
     * Create a new instance from JSON data.
     *
     * @param array<string, mixed>|string $json JSON data
     * @return static
     */
    public static function fromJson($json): self
    {
        if (is_string($json)) {
            $json = json_decode($json, true);
        }
        
        return new static(createdAt: $json['created_at'] ?? null,
            followerRole: $json['follower_role'] ?? null,
            pushPreference: $json['push_preference'] ?? null,
            status: $json['status'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            sourceFeed: $json['source_feed'] ?? null,
            targetFeed: $json['target_feed'] ?? null,
            requestAcceptedAt: $json['request_accepted_at'] ?? null,
            requestRejectedAt: $json['request_rejected_at'] ?? null,
            custom: $json['custom'] ?? null
        );
    }
} 
