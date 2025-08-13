<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MessageUpdate implements JsonSerializable
{
    public function __construct(public ?string $oldText = null,
        public ?MessageChangeSet $changeSet = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'old_text' => $this->oldText,
            'change_set' => $this->changeSet,
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
        
        return new static(oldText: $json['old_text'] ?? null,
            changeSet: $json['change_set'] ?? null
        );
    }
} 
