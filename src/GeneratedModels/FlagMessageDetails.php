<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FlagMessageDetails implements JsonSerializable
{
    public function __construct(public ?bool $pinChanged = null,
        public ?bool $shouldEnrich = null,
        public ?bool $skipPush = null,
        public ?string $updatedByID = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'pin_changed' => $this->pinChanged,
            'should_enrich' => $this->shouldEnrich,
            'skip_push' => $this->skipPush,
            'updated_by_id' => $this->updatedByID,
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
        
        return new static(pinChanged: $json['pin_changed'] ?? null,
            shouldEnrich: $json['should_enrich'] ?? null,
            skipPush: $json['skip_push'] ?? null,
            updatedByID: $json['updated_by_id'] ?? null
        );
    }
} 
