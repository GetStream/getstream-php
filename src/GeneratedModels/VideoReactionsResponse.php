<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class VideoReactionsResponse implements JsonSerializable
{
    public function __construct(public ?string $reaction = null,
        public ?VideoReactionOverTimeResponse $countOverTime = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'reaction' => $this->reaction,
            'count_over_time' => $this->countOverTime,
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
        
        return new static(reaction: $json['reaction'] ?? null,
            countOverTime: $json['count_over_time'] ?? null
        );
    }
} 
