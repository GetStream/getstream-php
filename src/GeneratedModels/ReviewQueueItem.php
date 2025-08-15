<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ReviewQueueItem extends BaseModel
{
    public function __construct(
        public ?string $aiTextSeverity = null,
        public ?int $bounceCount = null,
        public ?string $configKey = null,
        public ?bool $contentChanged = null,
        public ?\DateTime $createdAt = null,
        public ?string $entityID = null,
        public ?string $entityType = null,
        public ?int $flagsCount = null,
        public ?bool $hasImage = null,
        public ?bool $hasText = null,
        public ?bool $hasVideo = null,
        public ?string $id = null,
        public ?string $moderationPayloadHash = null,
        public ?string $recommendedAction = null,
        public ?string $reviewedBy = null,
        public ?int $severity = null,
        public ?string $status = null,
        public ?\DateTime $updatedAt = null,
        public ?array $actions = null,
        public ?array $bans = null,
        public ?array $flagLabels = null,
        public ?array $flagTypes = null,
        public ?array $flags = null,
        public ?array $languages = null,
        public ?array $reporterIds = null,
        public ?array $teams = null,
        public ?NullTime $archivedAt = null,
        public ?NullTime $completedAt = null,
        public ?NullTime $reviewedAt = null,
        public ?EnrichedActivity $activity = null,
        public ?User $assignedTo = null,
        public ?Call $call = null,
        public ?EntityCreator $entityCreator = null,
        public ?EnrichedActivity $feedsV2Activity = null,
        public ?Reaction $feedsV2Reaction = null,
        public ?Message $message = null,
        public ?ModerationPayload $moderationPayload = null,
        public ?Reaction $reaction = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
