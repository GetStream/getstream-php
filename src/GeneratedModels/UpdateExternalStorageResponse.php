<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Basic response information
 */
class UpdateExternalStorageResponse implements JsonSerializable
{
    public function __construct(public ?string $bucket = null,
        public ?string $duration = null,
        public ?string $name = null,
        public ?string $path = null,
        public ?string $type = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'bucket' => $this->bucket,
            'duration' => $this->duration,
            'name' => $this->name,
            'path' => $this->path,
            'type' => $this->type,
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
        
        return new static(bucket: $json['bucket'] ?? null,
            duration: $json['duration'] ?? null,
            name: $json['name'] ?? null,
            path: $json['path'] ?? null,
            type: $json['type'] ?? null
        );
    }
} 
