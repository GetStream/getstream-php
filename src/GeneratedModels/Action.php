<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Action implements JsonSerializable
{
    public function __construct(public ?string $name = null,
        public ?string $text = null,
        public ?string $type = null,
        public ?string $style = null,
        public ?string $value = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'text' => $this->text,
            'type' => $this->type,
            'style' => $this->style,
            'value' => $this->value,
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
            text: $json['text'] ?? null,
            type: $json['type'] ?? null,
            style: $json['style'] ?? null,
            value: $json['value'] ?? null
        );
    }
} 
