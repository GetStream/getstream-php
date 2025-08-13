<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RankingConfig implements JsonSerializable
{
    public function __construct(public ?string $score = null,
        public ?string $type = null,
        public ?object $defaults = null,
        public ?array $functions = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'score' => $this->score,
            'type' => $this->type,
            'defaults' => $this->defaults,
            'functions' => $this->functions,
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
        
        return new static(score: $json['score'] ?? null,
            type: $json['type'] ?? null,
            defaults: $json['defaults'] ?? null,
            functions: $json['functions'] ?? null
        );
    }
} 
