<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryAggregateCallStatsRequest implements JsonSerializable
{
    public function __construct(public ?string $from = null,
        public ?string $to = null,
        public ?array $reportTypes = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'from' => $this->from,
            'to' => $this->to,
            'report_types' => $this->reportTypes,
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
        
        return new static(from: $json['from'] ?? null,
            to: $json['to'] ?? null,
            reportTypes: $json['report_types'] ?? null
        );
    }
} 
