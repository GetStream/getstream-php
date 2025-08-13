<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MuteChannelRequest implements JsonSerializable
{
    public function __construct(public ?int $expiration = null,
        public ?string $userID = null,
        public ?array $channelCids = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'expiration' => $this->expiration,
            'user_id' => $this->userID,
            'channel_cids' => $this->channelCids,
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
        
        return new static(expiration: $json['expiration'] ?? null,
            userID: $json['user_id'] ?? null,
            channelCids: $json['channel_cids'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
