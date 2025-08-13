<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class BanActionRequest implements JsonSerializable
{
    public function __construct(public ?bool $channelBanOnly = null,
        public ?string $deleteMessages = null,
        public ?bool $ipBan = null,
        public ?string $reason = null,
        public ?bool $shadow = null,
        public ?int $timeout = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'channel_ban_only' => $this->channelBanOnly,
            'delete_messages' => $this->deleteMessages,
            'ip_ban' => $this->ipBan,
            'reason' => $this->reason,
            'shadow' => $this->shadow,
            'timeout' => $this->timeout,
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
        
        return new static(channelBanOnly: $json['channel_ban_only'] ?? null,
            deleteMessages: $json['delete_messages'] ?? null,
            ipBan: $json['ip_ban'] ?? null,
            reason: $json['reason'] ?? null,
            shadow: $json['shadow'] ?? null,
            timeout: $json['timeout'] ?? null
        );
    }
} 
