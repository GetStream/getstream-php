<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CheckSNSResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?string $status = null,
        public ?string $error = null,
        public ?object $data = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'status' => $this->status,
            'error' => $this->error,
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
        
        return new static(duration: $json['duration'] ?? null,
            status: $json['status'] ?? null,
            error: $json['error'] ?? null,
            data: $json['data'] ?? null
        );
    }
} 
