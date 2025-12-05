<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a moderation warning is issued to a user
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property string $message
 * @property string $userID
 * @property object $custom
 * @property string $type
 */
class CallModerationWarningEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $message = null, // The warning message
        public ?string $userID = null, // The user ID who is receiving the warning
        public ?object $custom = null, // Custom data associated with the moderation action
        public ?string $type = null, // The type of event: "call.moderation_warning" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
