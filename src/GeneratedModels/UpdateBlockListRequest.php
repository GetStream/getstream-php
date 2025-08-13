<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateBlockListRequest implements JsonSerializable
{
    public function __construct(public ?string $team = null,
        public ?array $words = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'team' => $this->team,
            'words' => $this->words,
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
        
        return new static(team: $json['team'] ?? null,
            words: $json['words'] ?? null
        );
    }
} 
