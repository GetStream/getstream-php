<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MessageFlagResponse implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?bool $createdByAutomod = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $approvedAt = null,
        public ?string $reason = null,
        public ?\DateTime $rejectedAt = null,
        public ?\DateTime $reviewedAt = null,
        public ?object $custom = null,
        public ?FlagDetails $details = null,
        public ?Message $message = null,
        public ?FlagFeedback $moderationFeedback = null,
        public ?MessageModerationResult $moderationResult = null,
        public ?UserResponse $reviewedBy = null,
        public ?UserResponse $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'created_by_automod' => $this->createdByAutomod,
            'updated_at' => $this->updatedAt,
            'approved_at' => $this->approvedAt,
            'reason' => $this->reason,
            'rejected_at' => $this->rejectedAt,
            'reviewed_at' => $this->reviewedAt,
            'custom' => $this->custom,
            'details' => $this->details,
            'message' => $this->message,
            'moderation_feedback' => $this->moderationFeedback,
            'moderation_result' => $this->moderationResult,
            'reviewed_by' => $this->reviewedBy,
            'user' => $this->user,
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
        
        return new static(createdAt: $json['created_at'] ?? null,
            createdByAutomod: $json['created_by_automod'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            approvedAt: $json['approved_at'] ?? null,
            reason: $json['reason'] ?? null,
            rejectedAt: $json['rejected_at'] ?? null,
            reviewedAt: $json['reviewed_at'] ?? null,
            custom: $json['custom'] ?? null,
            details: $json['details'] ?? null,
            message: $json['message'] ?? null,
            moderationFeedback: $json['moderation_feedback'] ?? null,
            moderationResult: $json['moderation_result'] ?? null,
            reviewedBy: $json['reviewed_by'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
