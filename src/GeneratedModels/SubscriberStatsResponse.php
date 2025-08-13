<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SubscriberStatsResponse implements JsonSerializable
{
    public function __construct(public ?int $total = null,
        public ?int $totalSubscribedDurationSeconds = null,
        public ?int $unique = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'total' => $this->total,
            'total_subscribed_duration_seconds' => $this->totalSubscribedDurationSeconds,
            'unique' => $this->unique,
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
        
        return new static(total: $json['total'] ?? null,
            totalSubscribedDurationSeconds: $json['total_subscribed_duration_seconds'] ?? null,
            unique: $json['unique'] ?? null
        );
    }
} 
