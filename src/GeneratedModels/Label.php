<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Label implements JsonSerializable
{
    public function __construct(public ?string $name = null,
        public ?array $harmLabels = null,
        public ?array $phraseListIds = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'harm_labels' => $this->harmLabels,
            'phrase_list_ids' => $this->phraseListIds,
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
            harmLabels: $json['harm_labels'] ?? null,
            phraseListIds: $json['phrase_list_ids'] ?? null
        );
    }
} 
