<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a call member is muted
 */
class CallUserMutedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "call.user_muted" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?string $fromUserID = null,
        public ?array $mutedUserIds = null,
        public ?string $reason = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
