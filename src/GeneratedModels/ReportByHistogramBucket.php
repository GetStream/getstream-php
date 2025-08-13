<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ReportByHistogramBucket implements JsonSerializable
{
    public function __construct(public ?string $category = null,
        public ?int $count = null,
        public ?int $sum = null,
        public ?Bound $lowerBound = null,
        public ?Bound $upperBound = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'category' => $this->category,
            'count' => $this->count,
            'sum' => $this->sum,
            'lower_bound' => $this->lowerBound,
            'upper_bound' => $this->upperBound,
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
        
        return new static(category: $json['category'] ?? null,
            count: $json['count'] ?? null,
            sum: $json['sum'] ?? null,
            lowerBound: $json['lower_bound'] ?? null,
            upperBound: $json['upper_bound'] ?? null
        );
    }
} 
