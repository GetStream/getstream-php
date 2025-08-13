<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateMemberPartialRequest implements JsonSerializable
{
    public function __construct(public ?array $unset = null,
        public ?object $set = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'unset' => $this->unset,
            'set' => $this->set,
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
        
        return new static(unset: $json['unset'] ?? null,
            set: $json['set'] ?? null
        );
    }
} 
