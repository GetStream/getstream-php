<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SendReactionRequest implements JsonSerializable
{
    public function __construct(public ?ReactionRequest $reaction = null,
        public ?bool $enforceUnique = null,
        public ?bool $skipPush = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'reaction' => $this->reaction,
            'enforce_unique' => $this->enforceUnique,
            'skip_push' => $this->skipPush,
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
        
        return new static(reaction: $json['reaction'] ?? null,
            enforceUnique: $json['enforce_unique'] ?? null,
            skipPush: $json['skip_push'] ?? null
        );
    }
} 
