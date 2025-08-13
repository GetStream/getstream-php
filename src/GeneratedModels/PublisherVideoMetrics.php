<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PublisherVideoMetrics implements JsonSerializable
{
    public function __construct(public ?ActiveCallsFPSStats $fps30 = null,
        public ?ActiveCallsLatencyStats $frameEncodingTimeMs = null,
        public ?ActiveCallsLatencyStats $jitterMs = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'fps_30' => $this->fps30,
            'frame_encoding_time_ms' => $this->frameEncodingTimeMs,
            'jitter_ms' => $this->jitterMs,
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
        
        return new static(fps30: $json['fps_30'] ?? null,
            frameEncodingTimeMs: $json['frame_encoding_time_ms'] ?? null,
            jitterMs: $json['jitter_ms'] ?? null
        );
    }
} 
