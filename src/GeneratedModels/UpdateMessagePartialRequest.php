<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateMessagePartialRequest implements JsonSerializable
{
    public function __construct(public ?bool $skipEnrichUrl = null,
        public ?string $userID = null,
        public ?array $unset = null,
        public ?object $set = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'skip_enrich_url' => $this->skipEnrichUrl,
            'user_id' => $this->userID,
            'unset' => $this->unset,
            'set' => $this->set,
            'user' => $this->user,
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
        
        return new static(skipEnrichUrl: $json['skip_enrich_url'] ?? null,
            userID: $json['user_id'] ?? null,
            unset: $json['unset'] ?? null,
            set: $json['set'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
