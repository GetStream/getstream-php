<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MessageHistoryEntryResponse implements JsonSerializable
{
    public function __construct(public ?bool $isDeleted = null,
        public ?string $messageID = null,
        public ?\DateTime $messageUpdatedAt = null,
        public ?string $messageUpdatedByID = null,
        public ?string $text = null,
        public ?array $attachments = null,
        public ?object $custom = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'is_deleted' => $this->isDeleted,
            'message_id' => $this->messageID,
            'message_updated_at' => $this->messageUpdatedAt,
            'message_updated_by_id' => $this->messageUpdatedByID,
            'text' => $this->text,
            'attachments' => $this->attachments,
            'Custom' => $this->custom,
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
        
        return new static(isDeleted: $json['is_deleted'] ?? null,
            messageID: $json['message_id'] ?? null,
            messageUpdatedAt: $json['message_updated_at'] ?? null,
            messageUpdatedByID: $json['message_updated_by_id'] ?? null,
            text: $json['text'] ?? null,
            attachments: $json['attachments'] ?? null,
            custom: $json['Custom'] ?? null
        );
    }
} 
