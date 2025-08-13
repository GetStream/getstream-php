<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class StartCampaignRequest implements JsonSerializable
{
    public function __construct(public ?\DateTime $scheduledFor = null,
        public ?\DateTime $stopAt = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'scheduled_for' => $this->scheduledFor,
            'stop_at' => $this->stopAt,
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
        
        return new static(scheduledFor: $json['scheduled_for'] ?? null,
            stopAt: $json['stop_at'] ?? null
        );
    }
} 
