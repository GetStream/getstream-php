<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FileUploadConfig implements JsonSerializable
{
    public function __construct(public ?int $sizeLimit = null,
        public ?array $allowedFileExtensions = null,
        public ?array $allowedMimeTypes = null,
        public ?array $blockedFileExtensions = null,
        public ?array $blockedMimeTypes = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'size_limit' => $this->sizeLimit,
            'allowed_file_extensions' => $this->allowedFileExtensions,
            'allowed_mime_types' => $this->allowedMimeTypes,
            'blocked_file_extensions' => $this->blockedFileExtensions,
            'blocked_mime_types' => $this->blockedMimeTypes,
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
        
        return new static(sizeLimit: $json['size_limit'] ?? null,
            allowedFileExtensions: $json['allowed_file_extensions'] ?? null,
            allowedMimeTypes: $json['allowed_mime_types'] ?? null,
            blockedFileExtensions: $json['blocked_file_extensions'] ?? null,
            blockedMimeTypes: $json['blocked_mime_types'] ?? null
        );
    }
} 
