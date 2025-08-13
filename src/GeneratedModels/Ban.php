<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Ban implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?bool $shadow = null,
        public ?\DateTime $expires = null,
        public ?string $reason = null,
        public ?Channel $channel = null,
        public ?User $createdBy = null,
        public ?User $target = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'shadow' => $this->shadow,
            'expires' => $this->expires,
            'reason' => $this->reason,
            'channel' => $this->channel,
            'created_by' => $this->createdBy,
            'target' => $this->target,
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
            shadow: $json['shadow'] ?? null,
            expires: $json['expires'] ?? null,
            reason: $json['reason'] ?? null,
            channel: $json['channel'] ?? null,
            createdBy: $json['created_by'] ?? null,
            target: $json['target'] ?? null
        );
    }
} 
