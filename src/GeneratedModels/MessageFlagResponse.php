<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class MessageFlagResponse extends BaseModel
{
    public function __construct(
        public ?bool $createdByAutomod = null,
        public ?MessageModerationResult $moderationResult = null,
        public ?FlagFeedbackResponse $moderationFeedback = null,
        public ?UserResponse $user = null,
        public ?MessageResponse $message = null,
        public ?FlagDetailsResponse $details = null,
        public ?string $reason = null,
        public ?object $custom = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $reviewedAt = null,
        public ?UserResponse $reviewedBy = null,
        public ?\DateTime $approvedAt = null,
        public ?\DateTime $rejectedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
