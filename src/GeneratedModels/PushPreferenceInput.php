<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PushPreferenceInput implements JsonSerializable
{
    public function __construct(public ?string $callLevel = null,
        public ?string $channelCid = null,
        public ?string $chatLevel = null,
        public ?\DateTime $disabledUntil = null,
        public ?bool $removeDisable = null,
        public ?string $userID = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'call_level' => $this->callLevel,
            'channel_cid' => $this->channelCid,
            'chat_level' => $this->chatLevel,
            'disabled_until' => $this->disabledUntil,
            'remove_disable' => $this->removeDisable,
            'user_id' => $this->userID,
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
        
        return new static(callLevel: $json['call_level'] ?? null,
            channelCid: $json['channel_cid'] ?? null,
            chatLevel: $json['chat_level'] ?? null,
            disabledUntil: $json['disabled_until'] ?? null,
            removeDisable: $json['remove_disable'] ?? null,
            userID: $json['user_id'] ?? null
        );
    }
} 
