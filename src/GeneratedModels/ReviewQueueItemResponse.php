<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ReviewQueueItemResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Unique identifier of the review queue item
        public ?\DateTime $createdAt = null, // When the item was created
        public ?\DateTime $updatedAt = null, // When the item was last updated
        public ?string $entityType = null, // Type of entity being reviewed
        public ?string $entityID = null, // ID of the entity being reviewed
        public ?ModerationPayloadResponse $moderationPayload = null,
        public ?string $status = null, // Current status of the review
        public ?string $recommendedAction = null, // Suggested moderation action
        public ?\DateTime $completedAt = null, // When the review was completed
        public ?\DateTime $reviewedAt = null, // When the item was reviewed
        public ?string $reviewedBy = null, // ID of the moderator who reviewed the item
        public ?array $languages = null, // Detected languages in the content
        public ?int $severity = null, // Severity level of the content
        public ?string $aiTextSeverity = null, // AI-determined text severity
        public ?string $latestModeratorAction = null,
        public ?ChatMessageResponse $message = null,
        public ?EnrichedActivity $activity = null,
        public ?Reaction $reaction = null,
        public ?CallResponse $call = null,
        public ?EntityCreatorResponse $entityCreator = null,
        public ?string $entityCreatorID = null, // ID of who created the entity
        public ?UserResponse $assignedTo = null,
        /** @var array<BanInfoResponse>|null */
        #[ArrayOf(BanInfoResponse::class)]
        public ?array $bans = null, // Associated ban records
        /** @var array<ModerationFlagResponse>|null */
        #[ArrayOf(ModerationFlagResponse::class)]
        public ?array $flags = null, // Associated flag records
        /** @var array<ActionLogResponse>|null */
        #[ArrayOf(ActionLogResponse::class)]
        public ?array $actions = null, // Moderation actions taken
        public ?AppealItemResponse $appeal = null,
        public ?EnrichedActivity $feedsV2Activity = null,
        public ?Reaction $feedsV2Reaction = null,
        public ?FeedsV3ActivityResponse $feedsV3Activity = null,
        public ?FeedsV3CommentResponse $feedsV3Comment = null,
        public ?array $teams = null, // Teams associated with this item
        public ?string $configKey = null,
        public ?int $flagsCount = null,
        public ?bool $escalated = null, // Whether the item has been escalated
        public ?EscalationMetadata $escalationMetadata = null,
        public ?string $escalatedBy = null, // ID of the moderator who escalated the item
        public ?\DateTime $escalatedAt = null, // When the item was escalated
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
