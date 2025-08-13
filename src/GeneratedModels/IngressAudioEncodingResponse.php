<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class IngressAudioEncodingResponse implements JsonSerializable
{
    public function __construct(public ?int $bitrate = null,
        public ?int $channels = null,
        public ?bool $enableDtx = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'bitrate' => $this->bitrate,
            'channels' => $this->channels,
            'enable_dtx' => $this->enableDtx,
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
        
        return new static(bitrate: $json['bitrate'] ?? null,
            channels: $json['channels'] ?? null,
            enableDtx: $json['enable_dtx'] ?? null
        );
    }
} 
