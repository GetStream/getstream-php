<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FileUploadResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?string $file = null,
        public ?string $thumbUrl = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'file' => $this->file,
            'thumb_url' => $this->thumbUrl,
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
            file: $json['file'] ?? null,
            thumbUrl: $json['thumb_url'] ?? null
        );
    }
} 
