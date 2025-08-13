<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SubscriberAudioMetrics implements JsonSerializable
{
    public function __construct(public ?ActiveCallsLatencyStats $concealmentPct = null,
        public ?ActiveCallsLatencyStats $jitterMs = null,
        public ?ActiveCallsLatencyStats $packetsLostPct = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'concealment_pct' => $this->concealmentPct,
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
        
        return new static(concealmentPct: $json['concealment_pct'] ?? null,
            jitterMs: $json['jitter_ms'] ?? null,
            packetsLostPct: $json['packets_lost_pct'] ?? null
        );
    }
} 
