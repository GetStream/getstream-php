<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SearchResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?array $results = null,
        public ?string $next = null,
        public ?string $previous = null,
        public ?SearchWarning $resultsWarning = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'results' => $this->results,
            'next' => $this->next,
            'previous' => $this->previous,
            'results_warning' => $this->resultsWarning,
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
            results: $json['results'] ?? null,
            next: $json['next'] ?? null,
            previous: $json['previous'] ?? null,
            resultsWarning: $json['results_warning'] ?? null
        );
    }
} 
