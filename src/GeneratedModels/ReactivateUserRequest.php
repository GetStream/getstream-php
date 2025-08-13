<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ReactivateUserRequest implements JsonSerializable
{
    public function __construct(public ?string $createdByID = null,
        public ?string $name = null,
        public ?bool $restoreMessages = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_by_id' => $this->createdByID,
            'name' => $this->name,
            'restore_messages' => $this->restoreMessages,
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
        
        return new static(createdByID: $json['created_by_id'] ?? null,
            name: $json['name'] ?? null,
            restoreMessages: $json['restore_messages'] ?? null
        );
    }
} 
