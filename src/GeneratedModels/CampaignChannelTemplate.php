<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CampaignChannelTemplate implements JsonSerializable
{
    public function __construct(public ?string $type = null,
        public ?object $custom = null,
        public ?string $id = null,
        public ?string $team = null,
        public ?array $members = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => $this->type,
            'custom' => $this->custom,
            'id' => $this->id,
            'team' => $this->team,
            'members' => $this->members,
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
        
        return new static(type: $json['type'] ?? null,
            custom: $json['custom'] ?? null,
            id: $json['id'] ?? null,
            team: $json['team'] ?? null,
            members: $json['members'] ?? null
        );
    }
} 
