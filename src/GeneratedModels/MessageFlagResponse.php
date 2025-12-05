<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property bool $createdByAutomod
 * @property \DateTime $updatedAt
 * @property \DateTime|null $approvedAt
 * @property string|null $reason
 * @property \DateTime|null $rejectedAt
 * @property \DateTime|null $reviewedAt
 * @property object|null $custom
 * @property FlagDetails|null $details
 * @property Message|null $message
 * @property FlagFeedback|null $moderationFeedback
 * @property MessageModerationResult|null $moderationResult
 * @property UserResponse|null $reviewedBy
 * @property UserResponse|null $user
 */
class MessageFlagResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?bool $createdByAutomod = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $approvedAt = null,
        public ?string $reason = null,
        public ?\DateTime $rejectedAt = null,
        public ?\DateTime $reviewedAt = null,
        public ?object $custom = null,
        public ?FlagDetails $details = null,
        public ?Message $message = null,
        public ?FlagFeedback $moderationFeedback = null,
        public ?MessageModerationResult $moderationResult = null,
        public ?UserResponse $reviewedBy = null,
        public ?UserResponse $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
