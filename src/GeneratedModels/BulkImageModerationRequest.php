<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class BulkImageModerationRequest implements JsonSerializable
{
    public function __construct(public ?string $csvFile = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'csv_file' => $this->csvFile,
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
        
        return new static(csvFile: $json['csv_file'] ?? null
        );
    }
} 
