<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FlagDetails implements JsonSerializable
{
    public function __construct(public ?string $originalText = null,
        public ?object $extra = null,
        public ?AutomodDetails $automod = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'original_text' => $this->originalText,
            'Extra' => $this->extra,
            'automod' => $this->automod,
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
        
        return new static(originalText: $json['original_text'] ?? null,
            extra: $json['Extra'] ?? null,
            automod: $json['automod'] ?? null
        );
    }
} 
