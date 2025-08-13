<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class LimitsSettingsRequest implements JsonSerializable
{
    public function __construct(public ?int $maxDurationSeconds = null,
        public ?int $maxParticipants = null,
        public ?bool $maxParticipantsExcludeOwner = null,
        public ?array $maxParticipantsExcludeRoles = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'max_duration_seconds' => $this->maxDurationSeconds,
            'max_participants' => $this->maxParticipants,
            'max_participants_exclude_owner' => $this->maxParticipantsExcludeOwner,
            'max_participants_exclude_roles' => $this->maxParticipantsExcludeRoles,
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
        
        return new static(maxDurationSeconds: $json['max_duration_seconds'] ?? null,
            maxParticipants: $json['max_participants'] ?? null,
            maxParticipantsExcludeOwner: $json['max_participants_exclude_owner'] ?? null,
            maxParticipantsExcludeRoles: $json['max_participants_exclude_roles'] ?? null
        );
    }
} 
