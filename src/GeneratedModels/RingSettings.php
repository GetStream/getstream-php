<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RingSettings implements JsonSerializable
{
    public function __construct(public ?int $autoCancelTimeoutMs = null,
        public ?int $incomingCallTimeoutMs = null,
        public ?int $missedCallTimeoutMs = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'auto_cancel_timeout_ms' => $this->autoCancelTimeoutMs,
            'incoming_call_timeout_ms' => $this->incomingCallTimeoutMs,
            'missed_call_timeout_ms' => $this->missedCallTimeoutMs,
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
        
        return new static(autoCancelTimeoutMs: $json['auto_cancel_timeout_ms'] ?? null,
            incomingCallTimeoutMs: $json['incoming_call_timeout_ms'] ?? null,
            missedCallTimeoutMs: $json['missed_call_timeout_ms'] ?? null
        );
    }
} 
