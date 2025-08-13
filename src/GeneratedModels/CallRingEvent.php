<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent to all call members to notify they are getting called
 */
class CallRingEvent implements JsonSerializable
{
    public function __construct(public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $sessionID = null,
        public ?bool $video = null,
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
            'session_id' => $this->sessionID,
            'video' => $this->video,
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
            sessionID: $json['session_id'] ?? null,
            video: $json['video'] ?? null,
            members: $json['members'] ?? null,
            call: $json['call'] ?? null,
            user: $json['user'] ?? null,
            type: $json['type'] ?? null
        );
    }
} 
