<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Represents a call
 */
class CallResponse extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of call
        public ?string $id = null, // Call ID
        public ?string $cid = null, // The unique identifier for a call (<type>:<id>)
        public ?string $currentSessionID = null,
        public ?string $team = null,
        public ?UserResponse $createdBy = null,
        public ?object $custom = null, // Custom data for this object
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        public ?bool $recording = null,
        public ?bool $transcribing = null,
        public ?bool $captioning = null,
        public ?bool $translating = null,
        public ?\DateTime $endedAt = null, // Date/time when the call ended
        public ?\DateTime $startsAt = null, // Date/time when the call will start
        public ?bool $backstage = null,
        public ?CallSettingsResponse $settings = null,
        public ?array $blockedUserIds = null,
        public ?CallIngressResponse $ingress = null,
        public ?CallSessionResponse $session = null,
        public ?EgressResponse $egress = null,
        public ?ThumbnailResponse $thumbnails = null,
        public ?int $joinAheadTimeSeconds = null,
        public ?string $channelCid = null,
        public ?string $routingNumber = null, // 10-digit routing number for SIP routing
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
