<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ParticipantCountByMinuteResponse implements JsonSerializable
{
    public function __construct(public ?int $first = null,
        public ?int $last = null,
        public ?int $max = null,
        public ?int $min = null,
        public ?\DateTime $startTs = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'first' => $this->first,
            'last' => $this->last,
            'max' => $this->max,
            'min' => $this->min,
            'start_ts' => $this->startTs,
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
        
        return new static(first: $json['first'] ?? null,
            last: $json['last'] ?? null,
            max: $json['max'] ?? null,
            min: $json['min'] ?? null,
            startTs: $json['start_ts'] ?? null
        );
    }
} 
