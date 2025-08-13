<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SubscriberAllMetrics implements JsonSerializable
{
    public function __construct(public ?SubscriberAudioMetrics $audio = null,
        public ?ActiveCallsLatencyStats $rttMs = null,
        public ?SubscriberVideoMetrics $video = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'audio' => $this->audio,
            'rtt_ms' => $this->rttMs,
            'video' => $this->video,
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
        
        return new static(audio: $json['audio'] ?? null,
            rttMs: $json['rtt_ms'] ?? null,
            video: $json['video'] ?? null
        );
    }
} 
