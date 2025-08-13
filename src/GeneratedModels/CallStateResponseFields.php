<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * CallStateResponseFields is the payload for call state response
 */
class CallStateResponseFields implements JsonSerializable
{
    public function __construct(public ?array $members = null,
        public ?array $ownCapabilities = null,
        public ?CallResponse $call = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'members' => $this->members,
            'own_capabilities' => $this->ownCapabilities,
            'call' => $this->call,
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
        
        return new static(members: $json['members'] ?? null,
            ownCapabilities: $json['own_capabilities'] ?? null,
            call: $json['call'] ?? null
        );
    }
} 
