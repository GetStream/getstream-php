<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ReviewQueueItemResponse implements JsonSerializable
{
    public function __construct(public ?string $aiTextSeverity = null,
        public ?\DateTime $createdAt = null,
        public ?string $entityID = null,
        public ?string $entityType = null,
        public ?int $flagsCount = null,
        public ?string $id = null,
        public ?string $recommendedAction = null,
        public ?string $reviewedBy = null,
        public ?int $severity = null,
        public ?string $status = null,
        public ?\DateTime $updatedAt = null,
        public ?array $actions = null,
        public ?array $bans = null,
        public ?array $flags = null,
        public ?array $languages = null,
        public ?\DateTime $completedAt = null,
        public ?string $configKey = null,
        public ?string $entityCreatorID = null,
        public ?\DateTime $reviewedAt = null,
        public ?array $teams = null,
        public ?EnrichedActivity $activity = null,
        public ?UserResponse $assignedTo = null,
        public ?CallResponse $call = null,
        public ?EntityCreatorResponse $entityCreator = null,
        public ?EnrichedActivity $feedsV2Activity = null,
        public ?Reaction $feedsV2Reaction = null,
        public ?MessageResponse $message = null,
        public ?ModerationPayload $moderationPayload = null,
        public ?Reaction $reaction = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'ai_text_severity' => $this->aiTextSeverity,
            'created_at' => $this->createdAt,
            'entity_id' => $this->entityID,
            'entity_type' => $this->entityType,
            'flags_count' => $this->flagsCount,
            'id' => $this->id,
            'recommended_action' => $this->recommendedAction,
            'reviewed_by' => $this->reviewedBy,
            'severity' => $this->severity,
            'status' => $this->status,
            'updated_at' => $this->updatedAt,
            'actions' => $this->actions,
            'bans' => $this->bans,
            'flags' => $this->flags,
            'languages' => $this->languages,
            'completed_at' => $this->completedAt,
            'config_key' => $this->configKey,
            'entity_creator_id' => $this->entityCreatorID,
            'reviewed_at' => $this->reviewedAt,
            'teams' => $this->teams,
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
            createdAt: $json['created_at'] ?? null,
            entityID: $json['entity_id'] ?? null,
            entityType: $json['entity_type'] ?? null,
            flagsCount: $json['flags_count'] ?? null,
            id: $json['id'] ?? null,
            recommendedAction: $json['recommended_action'] ?? null,
            reviewedBy: $json['reviewed_by'] ?? null,
            severity: $json['severity'] ?? null,
            status: $json['status'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            actions: $json['actions'] ?? null,
            bans: $json['bans'] ?? null,
            flags: $json['flags'] ?? null,
            languages: $json['languages'] ?? null,
            completedAt: $json['completed_at'] ?? null,
            configKey: $json['config_key'] ?? null,
            entityCreatorID: $json['entity_creator_id'] ?? null,
            reviewedAt: $json['reviewed_at'] ?? null,
            teams: $json['teams'] ?? null,
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
