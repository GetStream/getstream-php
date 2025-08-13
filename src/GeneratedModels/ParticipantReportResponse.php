<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ParticipantReportResponse implements JsonSerializable
{
    public function __construct(public ?int $sum = null,
        public ?int $unique = null,
        public ?int $maxConcurrent = null,
        public ?array $byBrowser = null,
        public ?array $byCountry = null,
        public ?array $byDevice = null,
        public ?array $byOperatingSystem = null,
        public ?ParticipantCountOverTimeResponse $countOverTime = null,
        public ?PublisherStatsResponse $publishers = null,
        public ?SubscriberStatsResponse $subscribers = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'sum' => $this->sum,
            'unique' => $this->unique,
            'max_concurrent' => $this->maxConcurrent,
            'by_browser' => $this->byBrowser,
            'by_country' => $this->byCountry,
            'by_device' => $this->byDevice,
            'by_operating_system' => $this->byOperatingSystem,
            'count_over_time' => $this->countOverTime,
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
        
        return new static(sum: $json['sum'] ?? null,
            unique: $json['unique'] ?? null,
            maxConcurrent: $json['max_concurrent'] ?? null,
            byBrowser: $json['by_browser'] ?? null,
            byCountry: $json['by_country'] ?? null,
            byDevice: $json['by_device'] ?? null,
            byOperatingSystem: $json['by_operating_system'] ?? null,
            countOverTime: $json['count_over_time'] ?? null,
            publishers: $json['publishers'] ?? null,
            subscribers: $json['subscribers'] ?? null
        );
    }
} 
