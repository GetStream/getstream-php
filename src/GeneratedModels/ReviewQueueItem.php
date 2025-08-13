<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ReviewQueueItem implements JsonSerializable
{
    public function __construct(public ?string $aiTextSeverity = null,
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
        public ?Reaction $reaction = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'ai_text_severity' => $this->aiTextSeverity,
            'bounce_count' => $this->bounceCount,
            'config_key' => $this->configKey,
            'content_changed' => $this->contentChanged,
            'created_at' => $this->createdAt,
            'entity_id' => $this->entityID,
            'entity_type' => $this->entityType,
            'flags_count' => $this->flagsCount,
            'has_image' => $this->hasImage,
            'has_text' => $this->hasText,
            'has_video' => $this->hasVideo,
            'id' => $this->id,
            'moderation_payload_hash' => $this->moderationPayloadHash,
            'recommended_action' => $this->recommendedAction,
            'reviewed_by' => $this->reviewedBy,
            'severity' => $this->severity,
            'status' => $this->status,
            'updated_at' => $this->updatedAt,
            'actions' => $this->actions,
            'bans' => $this->bans,
            'flag_labels' => $this->flagLabels,
            'flag_types' => $this->flagTypes,
            'flags' => $this->flags,
            'languages' => $this->languages,
            'reporter_ids' => $this->reporterIds,
            'teams' => $this->teams,
            'archived_at' => $this->archivedAt,
            'completed_at' => $this->completedAt,
            'reviewed_at' => $this->reviewedAt,
            'activity' => $this->activity,
            'assigned_to' => $this->assignedTo,
            'call' => $this->call,
            'entity_creator' => $this->entityCreator,
            'feeds_v2_activity' => $this->feedsV2Activity,
            'feeds_v2_reaction' => $this->feedsV2Reaction,
            'message' => $this->message,
            'moderation_payload' => $this->moderationPayload,
            'reaction' => $this->reaction,
        ], fn($v) => $v !== null);
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }

    /**
     * Create a new instance from JSON data.
     *
     * @param array<string, mixed>|string $json JSON data
     * @return static
     */
    public static function fromJson($json): self
    {
        if (is_string($json)) {
            $json = json_decode($json, true);
        }
        
        return new static(aiTextSeverity: $json['ai_text_severity'] ?? null,
            bounceCount: $json['bounce_count'] ?? null,
            configKey: $json['config_key'] ?? null,
            contentChanged: $json['content_changed'] ?? null,
            createdAt: $json['created_at'] ?? null,
            entityID: $json['entity_id'] ?? null,
            entityType: $json['entity_type'] ?? null,
            flagsCount: $json['flags_count'] ?? null,
            hasImage: $json['has_image'] ?? null,
            hasText: $json['has_text'] ?? null,
            hasVideo: $json['has_video'] ?? null,
            id: $json['id'] ?? null,
            moderationPayloadHash: $json['moderation_payload_hash'] ?? null,
            recommendedAction: $json['recommended_action'] ?? null,
            reviewedBy: $json['reviewed_by'] ?? null,
            severity: $json['severity'] ?? null,
            status: $json['status'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            actions: $json['actions'] ?? null,
            bans: $json['bans'] ?? null,
            flagLabels: $json['flag_labels'] ?? null,
            flagTypes: $json['flag_types'] ?? null,
            flags: $json['flags'] ?? null,
            languages: $json['languages'] ?? null,
            reporterIds: $json['reporter_ids'] ?? null,
            teams: $json['teams'] ?? null,
            archivedAt: $json['archived_at'] ?? null,
            completedAt: $json['completed_at'] ?? null,
            reviewedAt: $json['reviewed_at'] ?? null,
            activity: $json['activity'] ?? null,
            assignedTo: $json['assigned_to'] ?? null,
            call: $json['call'] ?? null,
            entityCreator: $json['entity_creator'] ?? null,
            feedsV2Activity: $json['feeds_v2_activity'] ?? null,
            feedsV2Reaction: $json['feeds_v2_reaction'] ?? null,
            message: $json['message'] ?? null,
            moderationPayload: $json['moderation_payload'] ?? null,
            reaction: $json['reaction'] ?? null
        );
    }
} 
