<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ActiveCallsSummary implements JsonSerializable
{
    public function __construct(public ?int $activeCalls = null,
        public ?int $activePublishers = null,
        public ?int $activeSubscribers = null,
        public ?int $participants = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'active_calls' => $this->activeCalls,
            'active_publishers' => $this->activePublishers,
            'active_subscribers' => $this->activeSubscribers,
            'participants' => $this->participants,
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
        
        return new static(activeCalls: $json['active_calls'] ?? null,
            activePublishers: $json['active_publishers'] ?? null,
            activeSubscribers: $json['active_subscribers'] ?? null,
            participants: $json['participants'] ?? null
        );
    }
} 
