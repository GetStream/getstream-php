<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Contains information about flagged user or message
 */
class Flag extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?bool $createdByAutomod = null,
        public ?\DateTime $updatedAt = null,    // Date/time of the last update 
        public ?\DateTime $approvedAt = null,    // Date of the approval 
        public ?string $reason = null,
        public ?\DateTime $rejectedAt = null,    // Date of the rejection 
        public ?\DateTime $reviewedAt = null,    // Date of the review 
        public ?string $reviewedBy = null,
        public ?string $targetMessageID = null,    // ID of flagged message 
        public ?object $custom = null,
        public ?FlagDetails $details = null,
        public ?Message $targetMessage = null,
        public ?User $targetUser = null,
        public ?User $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
