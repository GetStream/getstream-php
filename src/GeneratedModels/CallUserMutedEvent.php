<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a call member is muted
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property string $fromUserID
 * @property string $reason
 * @property array $mutedUserIds
 * @property string $type
 */
class CallUserMutedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $fromUserID = null,
        public ?string $reason = null,
        public ?array $mutedUserIds = null,
        public ?string $type = null, // The type of event: "call.user_muted" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
