<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Result of the message moderation
 *
 * @property string $action
 * @property \DateTime $createdAt
 * @property string $messageID
 * @property \DateTime $updatedAt
 * @property bool $userBadKarma
 * @property int $userKarma
 * @property string|null $blockedWord
 * @property string|null $blocklistName
 * @property string|null $moderatedBy
 * @property ModerationResponse|null $aiModerationResponse
 * @property Thresholds|null $moderationThresholds
 */
class MessageModerationResult extends BaseModel
{
    public function __construct(
        public ?string $action = null, // Action taken by automod
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $messageID = null, // ID of the message
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        public ?bool $userBadKarma = null, // Whether user has bad karma
        public ?int $userKarma = null, // Karma of the user
        public ?string $blockedWord = null, // Word that was blocked
        public ?string $blocklistName = null, // Name of the blocklist
        public ?string $moderatedBy = null, // User who moderated the message
        public ?ModerationResponse $aiModerationResponse = null,
        public ?Thresholds $moderationThresholds = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
