<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class GetOrCreateCallRequest implements JsonSerializable
{
    public function __construct(public ?int $membersLimit = null,
        public ?bool $notify = null,
        public ?bool $ring = null,
        public ?bool $video = null,
        public ?CallRequest $data = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'members_limit' => $this->membersLimit,
            'notify' => $this->notify,
            'ring' => $this->ring,
            'video' => $this->video,
            'data' => $this->data,
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
        
        return new static(membersLimit: $json['members_limit'] ?? null,
            notify: $json['notify'] ?? null,
            ring: $json['ring'] ?? null,
            video: $json['video'] ?? null,
            data: $json['data'] ?? null
        );
    }
} 
