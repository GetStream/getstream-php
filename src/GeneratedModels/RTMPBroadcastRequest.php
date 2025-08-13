<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * RTMPBroadcastRequest is the payload for starting an RTMP broadcast.
 */
class RTMPBroadcastRequest implements JsonSerializable
{
    public function __construct(public ?string $name = null,
        public ?string $streamUrl = null,
        public ?string $quality = null,
        public ?string $streamKey = null,
        public ?LayoutSettingsRequest $layout = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'stream_url' => $this->streamUrl,
            'quality' => $this->quality,
            'stream_key' => $this->streamKey,
            'layout' => $this->layout,
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
        
        return new static(name: $json['name'] ?? null,
            streamUrl: $json['stream_url'] ?? null,
            quality: $json['quality'] ?? null,
            streamKey: $json['stream_key'] ?? null,
            layout: $json['layout'] ?? null
        );
    }
} 
