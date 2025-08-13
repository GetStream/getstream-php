<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Result of the message moderation
 */
class MessageModerationResult implements JsonSerializable
{
    public function __construct(public ?string $action = null,
        public ?\DateTime $createdAt = null,
        public ?string $messageID = null,
        public ?\DateTime $updatedAt = null,
        public ?bool $userBadKarma = null,
        public ?int $userKarma = null,
        public ?string $blockedWord = null,
        public ?string $blocklistName = null,
        public ?string $moderatedBy = null,
        public ?ModerationResponse $aiModerationResponse = null,
        public ?Thresholds $moderationThresholds = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'action' => $this->action,
            'created_at' => $this->createdAt,
            'message_id' => $this->messageID,
            'updated_at' => $this->updatedAt,
            'user_bad_karma' => $this->userBadKarma,
            'user_karma' => $this->userKarma,
            'blocked_word' => $this->blockedWord,
            'blocklist_name' => $this->blocklistName,
            'moderated_by' => $this->moderatedBy,
            'ai_moderation_response' => $this->aiModerationResponse,
            'moderation_thresholds' => $this->moderationThresholds,
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
        
        return new static(action: $json['action'] ?? null,
            createdAt: $json['created_at'] ?? null,
            messageID: $json['message_id'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            userBadKarma: $json['user_bad_karma'] ?? null,
            userKarma: $json['user_karma'] ?? null,
            blockedWord: $json['blocked_word'] ?? null,
            blocklistName: $json['blocklist_name'] ?? null,
            moderatedBy: $json['moderated_by'] ?? null,
            aiModerationResponse: $json['ai_moderation_response'] ?? null,
            moderationThresholds: $json['moderation_thresholds'] ?? null
        );
    }
} 
