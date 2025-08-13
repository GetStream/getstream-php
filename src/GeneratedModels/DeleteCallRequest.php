<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * DeleteCallRequest is the payload for deleting a call.
 */
class DeleteCallRequest implements JsonSerializable
{
    public function __construct(public ?bool $hard = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'hard' => $this->hard,
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
        
        return new static(hard: $json['hard'] ?? null
        );
    }
} 
