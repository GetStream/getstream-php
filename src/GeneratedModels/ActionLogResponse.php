<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property string $id
 * @property string $reason
 * @property string $targetUserID
 * @property string $type
 * @property string $userID
 * @property array $aiProviders
 * @property object $custom
 * @property ReviewQueueItemResponse|null $reviewQueueItem
 * @property UserResponse|null $targetUser
 * @property UserResponse|null $user
 */
class ActionLogResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Timestamp when the action was taken
        public ?string $id = null, // Unique identifier of the action log
        public ?string $reason = null, // Reason for the moderation action
        public ?string $targetUserID = null, // ID of the user who was the target of the action
        public ?string $type = null, // Type of moderation action
        public ?string $userID = null, // ID of the user who performed the action
        public ?array $aiProviders = null,
        public ?object $custom = null, // Additional metadata about the action
        public ?ReviewQueueItemResponse $reviewQueueItem = null,
        public ?UserResponse $targetUser = null,
        public ?UserResponse $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
