<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Result of the message moderation
 */
class MessageModerationResult extends BaseModel
{
    public function __construct(
        public ?string $messageID = null, // ID of the message
        public ?string $action = null, // Action taken by automod
        public ?string $moderatedBy = null, // User who moderated the message
        public ?string $blockedWord = null, // Word that was blocked
        public ?string $blocklistName = null, // Name of the blocklist
        public ?Thresholds $moderationThresholds = null,
        public ?ModerationResponse $aiModerationResponse = null,
        public ?float $userKarma = null, // Karma of the user
        public ?bool $userBadKarma = null, // Whether user has bad karma
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $updatedAt = null, // Date/time of the last update
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
