<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ImageUploadRequest implements JsonSerializable
{
    public function __construct(public ?string $file = null,
        public ?array $uploadSizes = null,
        public ?OnlyUserID $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'file' => $this->file,
            'upload_sizes' => $this->uploadSizes,
            'user' => $this->user,
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
        
        return new static(file: $json['file'] ?? null,
            uploadSizes: $json['upload_sizes'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
