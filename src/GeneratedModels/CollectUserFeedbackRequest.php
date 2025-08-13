<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CollectUserFeedbackRequest implements JsonSerializable
{
    public function __construct(public ?int $rating = null,
        public ?string $sdk = null,
        public ?string $sdkVersion = null,
        public ?string $reason = null,
        public ?string $userSessionID = null,
        public ?object $custom = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'rating' => $this->rating,
            'sdk' => $this->sdk,
            'sdk_version' => $this->sdkVersion,
            'reason' => $this->reason,
            'user_session_id' => $this->userSessionID,
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
        
        return new static(rating: $json['rating'] ?? null,
            sdk: $json['sdk'] ?? null,
            sdkVersion: $json['sdk_version'] ?? null,
            reason: $json['reason'] ?? null,
            userSessionID: $json['user_session_id'] ?? null,
            custom: $json['custom'] ?? null
        );
    }
} 
