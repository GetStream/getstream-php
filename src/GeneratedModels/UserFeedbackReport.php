<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UserFeedbackReport implements JsonSerializable
{
    public function __construct(public ?int $unreportedCount = null,
        public ?array $countByRating = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'unreported_count' => $this->unreportedCount,
            'count_by_rating' => $this->countByRating,
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
        
        return new static(unreportedCount: $json['unreported_count'] ?? null,
            countByRating: $json['count_by_rating'] ?? null
        );
    }
} 
