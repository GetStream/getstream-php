<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class StopTranscriptionRequest implements JsonSerializable
{
    public function __construct(public ?bool $stopClosedCaptions = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'stop_closed_captions' => $this->stopClosedCaptions,
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
        
        return new static(stopClosedCaptions: $json['stop_closed_captions'] ?? null
        );
    }
} 
