<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when a user submits feedback for a call.
 */
class CallUserFeedbackSubmittedEvent implements JsonSerializable
{
    public function __construct(public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?int $rating = null,
        public ?string $sessionID = null,
        public ?UserResponse $user = null,
        public ?string $type = null,
        public ?string $reason = null,
        public ?string $sdk = null,
        public ?string $sdkVersion = null,
        public ?object $custom = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'call_cid' => $this->callCid,
            'created_at' => $this->createdAt,
            'rating' => $this->rating,
            'session_id' => $this->sessionID,
            'user' => $this->user,
            'type' => $this->type,
            'reason' => $this->reason,
            'sdk' => $this->sdk,
            'sdk_version' => $this->sdkVersion,
            'custom' => $this->custom,
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
            rating: $json['rating'] ?? null,
            sessionID: $json['session_id'] ?? null,
            user: $json['user'] ?? null,
            type: $json['type'] ?? null,
            reason: $json['reason'] ?? null,
            sdk: $json['sdk'] ?? null,
            sdkVersion: $json['sdk_version'] ?? null,
            custom: $json['custom'] ?? null
        );
    }
} 
