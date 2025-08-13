<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallModerationWarningEvent implements JsonSerializable
{
    public function __construct(public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $message = null,
        public ?string $userID = null,
        public ?object $custom = null,
        public ?string $type = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'call_cid' => $this->callCid,
            'created_at' => $this->createdAt,
            'message' => $this->message,
            'user_id' => $this->userID,
            'custom' => $this->custom,
            'type' => $this->type,
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
        
        return new static(callCid: $json['call_cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            message: $json['message'] ?? null,
            userID: $json['user_id'] ?? null,
            custom: $json['custom'] ?? null,
            type: $json['type'] ?? null
        );
    }
} 
