<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AppealItemResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?UserResponse $user = null, // User response object
        public ?string $entityType = null, // Type of entity
        public ?string $entityID = null, // ID of the entity
        public ?ModerationPayload $entityContent = null,
        public ?string $appealReason = null, // Reason Text of the Appeal Item
        public ?string $status = null, // Status of the Appeal Item
        public ?string $decisionReason = null, // Decision Reason of the Appeal Item
        public ?array $attachments = null, // Attachments(e.g. Images) of the Appeal Item
        public ?\DateTime $createdAt = null, // When the flag was created
        public ?\DateTime $updatedAt = null, // When the flag was last updated
        public ?ActionLogResponse $moderationAction = null,
        public ?ActionLogResponse $originalModerationAction = null,
        /** @var array<ActionLogResponse>|null */
        #[ArrayOf(ActionLogResponse::class)]
        public ?array $actions = null, // Full chronological history of all moderation actions on the review queue item
        public ?string $recommendedAction = null, // Action recommended by the automated moderation system (e.g. flag, remove, shadow)
        public ?string $channelCid = null, // CID of the channel the entity belongs to, if applicable
        public ?array $flagTypes = null, // Types of flags applied to the entity (e.g. user_report, bodyguard)
        public ?array $flagLabels = null, // Classification labels from automated and manual review
        /** @var array<ModerationFlagResponse>|null */
        #[ArrayOf(ModerationFlagResponse::class)]
        public ?array $flags = null, // Per-provider flag records explaining why the action was taken
        public ?int $severity = null, // Overall content severity score (1–100)
        public ?string $aiTextSeverity = null, // Text severity level assigned by the AI provider
        public ?string $configKey = null, // Moderation policy key that was applied
        public ?string $reviewQueueItemID = null, // ID of the review queue item linked to this appeal, if the appeal was submitted with one
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
