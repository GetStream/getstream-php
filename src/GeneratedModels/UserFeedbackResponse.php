<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UserFeedbackResponse implements JsonSerializable
{
    public function __construct(public ?string $cid = null,
        public ?int $rating = null,
        public ?string $reason = null,
        public ?string $sdk = null,
        public ?string $sdkVersion = null,
        public ?string $sessionID = null,
        public ?string $userID = null,
        public ?PlatformDataResponse $platform = null,
        public ?object $custom = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'cid' => $this->cid,
            'rating' => $this->rating,
            'reason' => $this->reason,
            'sdk' => $this->sdk,
            'sdk_version' => $this->sdkVersion,
            'session_id' => $this->sessionID,
            'user_id' => $this->userID,
            'platform' => $this->platform,
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
        
        return new static(cid: $json['cid'] ?? null,
            rating: $json['rating'] ?? null,
            reason: $json['reason'] ?? null,
            sdk: $json['sdk'] ?? null,
            sdkVersion: $json['sdk_version'] ?? null,
            sessionID: $json['session_id'] ?? null,
            userID: $json['user_id'] ?? null,
            platform: $json['platform'] ?? null,
            custom: $json['custom'] ?? null
        );
    }
} 
