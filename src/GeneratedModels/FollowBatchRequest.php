<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FollowBatchRequest implements JsonSerializable
{
    public function __construct(public ?array $follows = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'follows' => $this->follows,
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
        
        return new static(follows: $json['follows'] ?? null
        );
    }
} 
