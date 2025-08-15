<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Represents a call
 */
class CallResponse extends BaseModel
{
    public function __construct(
        public ?bool $backstage = null,
        public ?bool $captioning = null,
        public ?string $cid = null,    // The unique identifier for a call (<type>:<id>) 
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?string $currentSessionID = null,
        public ?string $id = null,    // Call ID 
        public ?bool $recording = null,
        public ?bool $transcribing = null,
        public ?string $type = null,    // The type of call 
        public ?\DateTime $updatedAt = null,    // Date/time of the last update 
        public ?array $blockedUserIds = null,
        public ?UserResponse $createdBy = null,
        public ?object $custom = null,    // Custom data for this object 
        public ?EgressResponse $egress = null,
        public ?CallIngressResponse $ingress = null,
        public ?CallSettingsResponse $settings = null,
        public ?string $channelCid = null,
        public ?\DateTime $endedAt = null,    // Date/time when the call ended 
        public ?int $joinAheadTimeSeconds = null,
        public ?\DateTime $startsAt = null,    // Date/time when the call will start 
        public ?string $team = null,
        public ?CallSessionResponse $session = null,
        public ?ThumbnailResponse $thumbnails = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
