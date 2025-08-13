<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ActiveCallsMetrics implements JsonSerializable
{
    public function __construct(public ?JoinCallAPIMetrics $joinCallAPI = null,
        public ?PublishersMetrics $publishers = null,
        public ?SubscribersMetrics $subscribers = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'join_call_api' => $this->joinCallAPI,
            'publishers' => $this->publishers,
            'subscribers' => $this->subscribers,
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
        
        return new static(joinCallAPI: $json['join_call_api'] ?? null,
            publishers: $json['publishers'] ?? null,
            subscribers: $json['subscribers'] ?? null
        );
    }
} 
