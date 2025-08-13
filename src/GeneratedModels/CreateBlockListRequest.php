<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Block list contains restricted words
 */
class CreateBlockListRequest implements JsonSerializable
{
    public function __construct(public ?string $name = null,
        public ?array $words = null,
        public ?string $team = null,
        public ?string $type = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'words' => $this->words,
            'team' => $this->team,
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
        
        return new static(name: $json['name'] ?? null,
            words: $json['words'] ?? null,
            team: $json['team'] ?? null,
            type: $json['type'] ?? null
        );
    }
} 
