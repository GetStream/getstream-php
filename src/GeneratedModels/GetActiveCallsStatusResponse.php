<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Response containing active calls status information
 */
class GetActiveCallsStatusResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?\DateTime $endTime = null,
        public ?\DateTime $startTime = null,
        public ?ActiveCallsMetrics $metrics = null,
        public ?ActiveCallsSummary $summary = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'end_time' => $this->endTime,
            'start_time' => $this->startTime,
            'metrics' => $this->metrics,
            'summary' => $this->summary,
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
            endTime: $json['end_time'] ?? null,
            startTime: $json['start_time'] ?? null,
            metrics: $json['metrics'] ?? null,
            summary: $json['summary'] ?? null
        );
    }
} 
