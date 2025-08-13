<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class APNS implements JsonSerializable
{
    public function __construct(public ?string $body = null,
        public ?string $title = null,
        public ?int $contentAvailable = null,
        public ?int $mutableContent = null,
        public ?string $sound = null,
        public ?object $data = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'body' => $this->body,
            'title' => $this->title,
            'content-available' => $this->contentAvailable,
            'mutable-content' => $this->mutableContent,
            'sound' => $this->sound,
            'data' => $this->data,
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
        
        return new static(body: $json['body'] ?? null,
            title: $json['title'] ?? null,
            contentAvailable: $json['content-available'] ?? null,
            mutableContent: $json['mutable-content'] ?? null,
            sound: $json['sound'] ?? null,
            data: $json['data'] ?? null
        );
    }
} 
