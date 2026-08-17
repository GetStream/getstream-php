<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FlagResponse extends BaseModel
{
    public function __construct(
        public ?bool $createdByAutomod = null,
        public ?UserResponse $user = null, // User response object
        public ?string $targetMessageID = null,
        public ?MessageResponse $targetMessage = null, // Represents any chat message
        public ?UserResponse $targetUser = null, // User response object
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $reviewedAt = null,
        public ?string $reviewedBy = null,
        public ?\DateTime $approvedAt = null,
        public ?\DateTime $rejectedAt = null,
        public ?string $reason = null,
        public ?FlagDetails $details = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
