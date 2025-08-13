<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class NetworkMetricsReportResponse implements JsonSerializable
{
    public function __construct(public ?int $averageConnectionTime = null,
        public ?int $averageJitter = null,
        public ?int $averageLatency = null,
        public ?int $averageTimeToReconnect = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'average_connection_time' => $this->averageConnectionTime,
            'average_jitter' => $this->averageJitter,
            'average_latency' => $this->averageLatency,
            'average_time_to_reconnect' => $this->averageTimeToReconnect,
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
        
        return new static(averageConnectionTime: $json['average_connection_time'] ?? null,
            averageJitter: $json['average_jitter'] ?? null,
            averageLatency: $json['average_latency'] ?? null,
            averageTimeToReconnect: $json['average_time_to_reconnect'] ?? null
        );
    }
} 
