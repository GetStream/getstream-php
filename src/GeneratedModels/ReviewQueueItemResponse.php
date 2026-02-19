<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ReviewQueueItemResponse extends BaseModel
{
    public function __construct(
        public ?EnrichedActivity $activity = null,
        public ?AppealItemResponse $appeal = null,
        public ?UserResponse $assignedTo = null,
        public ?CallResponse $call = null,
        public ?EntityCreatorResponse $entityCreator = null,
        public ?EnrichedActivity $feedsV2Activity = null,
        public ?Reaction $feedsV2Reaction = null,
        public ?ActivityResponse $feedsV3Activity = null,
        public ?CommentResponse $feedsV3Comment = null,
        public ?MessageResponse $message = null,
        public ?ModerationPayloadResponse $moderationPayload = null,
        public ?Reaction $reaction = null,
        public ?string $id = null, // Unique identifier of the review queue item
        public ?\DateTime $createdAt = null, // When the item was created
        public ?\DateTime $updatedAt = null, // When the item was last updated
        public ?string $entityType = null, // Type of entity being reviewed
        public ?string $entityID = null, // ID of the entity being reviewed
        public ?string $status = null, // Current status of the review
        public ?string $recommendedAction = null, // Suggested moderation action
        public ?\DateTime $completedAt = null, // When the review was completed
        public ?\DateTime $reviewedAt = null, // When the item was reviewed
        public ?string $reviewedBy = null, // ID of the moderator who reviewed the item
        public ?array $languages = null, // Detected languages in the content
        public ?int $severity = null, // Severity level of the content
        public ?string $aiTextSeverity = null, // AI-determined text severity
        public ?string $latestModeratorAction = null,
        public ?string $entityCreatorID = null, // ID of who created the entity
        /** @var array<BanInfoResponse>|null */
        #[ArrayOf(BanInfoResponse::class)]
        public ?array $bans = null, // Associated ban records
        /** @var array<ModerationFlagResponse>|null */
        #[ArrayOf(ModerationFlagResponse::class)]
        public ?array $flags = null, // Associated flag records
        /** @var array<ActionLogResponse>|null */
        #[ArrayOf(ActionLogResponse::class)]
        public ?array $actions = null, // Moderation actions taken
        public ?array $teams = null, // Teams associated with this item
        public ?string $configKey = null,
        public ?int $flagsCount = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
