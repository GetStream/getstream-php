<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FlagFeedback implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $messageID = null,
        public ?array $labels = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'message_id' => $this->messageID,
            'labels' => $this->labels,
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
            messageID: $json['message_id'] ?? null,
            labels: $json['labels'] ?? null
        );
    }
} 
