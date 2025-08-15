<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Emitted when a follow relationship is updated.
 */
class FollowUpdatedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?string $fid = null,
        public ?object $custom = null,
        public ?FollowResponse $follow = null,
        public ?string $type = null,    // The type of event: "feeds.follow.updated" in this case 
        public ?string $feedVisibility = null,
        public ?\DateTime $receivedAt = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
