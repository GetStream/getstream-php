<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SubscriberVideoMetrics implements JsonSerializable
{
    public function __construct(public ?ActiveCallsFPSStats $fps30 = null,
        public ?ActiveCallsLatencyStats $jitterMs = null,
        public ?ActiveCallsLatencyStats $packetsLostPct = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'fps_30' => $this->fps30,
            'jitter_ms' => $this->jitterMs,
            'packets_lost_pct' => $this->packetsLostPct,
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
            jitterMs: $json['jitter_ms'] ?? null,
            packetsLostPct: $json['packets_lost_pct'] ?? null
        );
    }
} 
