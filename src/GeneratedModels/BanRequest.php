<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class BanRequest implements JsonSerializable
{
    public function __construct(public ?string $targetUserID = null,
        public ?string $bannedByID = null,
        public ?string $channelCid = null,
        public ?string $deleteMessages = null,
        public ?bool $ipBan = null,
        public ?string $reason = null,
        public ?bool $shadow = null,
        public ?int $timeout = null,
        public ?UserRequest $bannedBy = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'target_user_id' => $this->targetUserID,
            'banned_by_id' => $this->bannedByID,
            'channel_cid' => $this->channelCid,
            'delete_messages' => $this->deleteMessages,
            'ip_ban' => $this->ipBan,
            'reason' => $this->reason,
            'shadow' => $this->shadow,
            'timeout' => $this->timeout,
            'banned_by' => $this->bannedBy,
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
        
        return new static(targetUserID: $json['target_user_id'] ?? null,
            bannedByID: $json['banned_by_id'] ?? null,
            channelCid: $json['channel_cid'] ?? null,
            deleteMessages: $json['delete_messages'] ?? null,
            ipBan: $json['ip_ban'] ?? null,
            reason: $json['reason'] ?? null,
            shadow: $json['shadow'] ?? null,
            timeout: $json['timeout'] ?? null,
            bannedBy: $json['banned_by'] ?? null
        );
    }
} 
