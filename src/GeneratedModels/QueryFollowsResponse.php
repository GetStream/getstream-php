<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryFollowsResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?array $follows = null,
        public ?string $next = null,
        public ?string $prev = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'follows' => $this->follows,
            'next' => $this->next,
            'prev' => $this->prev,
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
        
        return new static(duration: $json['duration'] ?? null,
            follows: $json['follows'] ?? null,
            next: $json['next'] ?? null,
            prev: $json['prev'] ?? null
        );
    }
} 
