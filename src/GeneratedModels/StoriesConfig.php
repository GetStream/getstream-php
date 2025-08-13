<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class StoriesConfig implements JsonSerializable
{
    public function __construct(public ?string $expirationBehaviour = null,
        public ?bool $skipWatched = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'expiration_behaviour' => $this->expirationBehaviour,
            'skip_watched' => $this->skipWatched,
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
        
        return new static(expirationBehaviour: $json['expiration_behaviour'] ?? null,
            skipWatched: $json['skip_watched'] ?? null
        );
    }
} 
