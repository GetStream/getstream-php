<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when closed captions are being sent in a call, clients should use this to show the closed captions in the call screen
 */
class ClosedCaptionEvent implements JsonSerializable
{
    public function __construct(public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?CallClosedCaption $closedCaption = null,
        public ?string $type = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'call_cid' => $this->callCid,
            'created_at' => $this->createdAt,
            'closed_caption' => $this->closedCaption,
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
            closedCaption: $json['closed_caption'] ?? null,
            type: $json['type'] ?? null
        );
    }
} 
