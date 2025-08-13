<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent to call members who did not accept/reject/join the call to notify they missed the call
 */
class CallMissedEvent implements JsonSerializable
{
    public function __construct(public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?bool $notifyUser = null,
        public ?string $sessionID = null,
        public ?array $members = null,
        public ?CallResponse $call = null,
        public ?UserResponse $user = null,
        public ?string $type = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'call_cid' => $this->callCid,
            'created_at' => $this->createdAt,
            'notify_user' => $this->notifyUser,
            'session_id' => $this->sessionID,
            'members' => $this->members,
            'call' => $this->call,
            'user' => $this->user,
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
            notifyUser: $json['notify_user'] ?? null,
            sessionID: $json['session_id'] ?? null,
            members: $json['members'] ?? null,
            call: $json['call'] ?? null,
            user: $json['user'] ?? null,
            type: $json['type'] ?? null
        );
    }
} 
