<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UserCreatedWithinParameters implements JsonSerializable
{
    public function __construct(public ?string $maxAge = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'max_age' => $this->maxAge,
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
        
        return new static(maxAge: $json['max_age'] ?? null
        );
    }
} 
