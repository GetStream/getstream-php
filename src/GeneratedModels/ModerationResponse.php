<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ModerationResponse implements JsonSerializable
{
    public function __construct(public ?string $action = null,
        public ?int $explicit = null,
        public ?int $spam = null,
        public ?int $toxic = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'action' => $this->action,
            'explicit' => $this->explicit,
            'spam' => $this->spam,
            'toxic' => $this->toxic,
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
        
        return new static(action: $json['action'] ?? null,
            explicit: $json['explicit'] ?? null,
            spam: $json['spam'] ?? null,
            toxic: $json['toxic'] ?? null
        );
    }
} 
