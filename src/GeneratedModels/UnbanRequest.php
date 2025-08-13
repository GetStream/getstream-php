<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UnbanRequest implements JsonSerializable
{
    public function __construct(public ?string $unbannedByID = null,
        public ?UserRequest $unbannedBy = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'unbanned_by_id' => $this->unbannedByID,
            'unbanned_by' => $this->unbannedBy,
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
        
        return new static(unbannedByID: $json['unbanned_by_id'] ?? null,
            unbannedBy: $json['unbanned_by'] ?? null
        );
    }
} 
