<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $aiTextSeverity
 * @property \DateTime $createdAt
 * @property string $entityID
 * @property string $entityType
 * @property int $flagsCount
 * @property string $id
 * @property string $latestModeratorAction
 * @property string $recommendedAction
 * @property string $reviewedBy
 * @property int $severity
 * @property string $status
 * @property \DateTime $updatedAt
 * @property array<ActionLogResponse> $actions
 * @property array<Ban> $bans
 * @property array<ModerationFlagResponse> $flags
 * @property array $languages
 * @property \DateTime|null $completedAt
 * @property string|null $configKey
 * @property string|null $entityCreatorID
 * @property \DateTime|null $reviewedAt
 * @property array|null $teams
 * @property EnrichedActivity|null $activity
 * @property UserResponse|null $assignedTo
 * @property CallResponse|null $call
 * @property EntityCreatorResponse|null $entityCreator
 * @property EnrichedActivity|null $feedsV2Activity
 * @property Reaction|null $feedsV2Reaction
 * @property ActivityResponse|null $feedsV3Activity
 * @property CommentResponse|null $feedsV3Comment
 * @property MessageResponse|null $message
 * @property ModerationPayload|null $moderationPayload
 * @property Reaction|null $reaction
 */
class ReviewQueueItemResponse extends BaseModel
{
    public function __construct(
        public ?string $aiTextSeverity = null, // AI-determined text severity
        public ?\DateTime $createdAt = null, // When the item was created
        public ?string $entityID = null, // ID of the entity being reviewed
        public ?string $entityType = null, // Type of entity being reviewed
        public ?int $flagsCount = null,
        public ?string $id = null, // Unique identifier of the review queue item
        public ?string $latestModeratorAction = null,
        public ?string $recommendedAction = null, // Suggested moderation action
        public ?string $reviewedBy = null, // ID of the moderator who reviewed the item
        public ?int $severity = null, // Severity level of the content
        public ?string $status = null, // Current status of the review
        public ?\DateTime $updatedAt = null, // When the item was last updated
        /** @var array<ActionLogResponse>|null Moderation actions taken */
        #[ArrayOf(ActionLogResponse::class)]
        public ?array $actions = null, // Moderation actions taken
        /** @var array<Ban>|null Associated ban records */
        #[ArrayOf(Ban::class)]
        public ?array $bans = null, // Associated ban records
        /** @var array<ModerationFlagResponse>|null Associated flag records */
        #[ArrayOf(ModerationFlagResponse::class)]
        public ?array $flags = null, // Associated flag records
        public ?array $languages = null, // Detected languages in the content
        public ?\DateTime $completedAt = null, // When the review was completed
        public ?string $configKey = null,
        public ?string $entityCreatorID = null, // ID of who created the entity
        public ?\DateTime $reviewedAt = null, // When the item was reviewed
        public ?array $teams = null, // Teams associated with this item
        public ?EnrichedActivity $activity = null,
        public ?UserResponse $assignedTo = null,
        public ?CallResponse $call = null,
        public ?EntityCreatorResponse $entityCreator = null,
        public ?EnrichedActivity $feedsV2Activity = null,
        public ?Reaction $feedsV2Reaction = null,
        public ?ActivityResponse $feedsV3Activity = null,
        public ?CommentResponse $feedsV3Comment = null,
        public ?MessageResponse $message = null,
        public ?ModerationPayload $moderationPayload = null,
        public ?Reaction $reaction = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
