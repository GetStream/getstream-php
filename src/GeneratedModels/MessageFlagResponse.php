<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class MessageFlagResponse extends BaseModel
{
    public function __construct(
        public ?bool $createdByAutomod = null,
        public ?MessageModerationResult $moderationResult = null, // Result of the message moderation
        public ?FlagFeedbackResponse $moderationFeedback = null,
        public ?UserResponse $user = null, // User response object
        public ?MessageResponse $message = null, // Represents any chat message
        public ?FlagDetailsResponse $details = null,
        public ?string $reason = null,
        public ?object $custom = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $reviewedAt = null,
        public ?UserResponse $reviewedBy = null, // User response object
        public ?\DateTime $approvedAt = null,
        public ?\DateTime $rejectedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
