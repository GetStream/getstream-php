<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a user gets flagged. The event contains information about the user that was flagged.
 */
class UserFlaggedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "user.flagged" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?UserResponseCommonFields $user = null,
        public ?UserResponseCommonFields $targetUser = null,
        public ?string $reason = null, // The reason for the flag
        public ?int $totalFlags = null, // The total number of flags for the user
        public ?object $custom = null, // Custom data
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
