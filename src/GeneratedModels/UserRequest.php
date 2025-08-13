<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * User request object
 */
class UserRequest implements JsonSerializable
{
    public function __construct(public ?string $id = null,
        public ?string $image = null,
        public ?bool $invisible = null,
        public ?string $language = null,
        public ?string $name = null,
        public ?string $role = null,
        public ?array $teams = null,
        public ?object $custom = null,
        public ?PrivacySettingsResponse $privacySettings = null,
        public ?array $teamsRole = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'id' => $this->id,
            'image' => $this->image,
            'invisible' => $this->invisible,
            'language' => $this->language,
            'name' => $this->name,
            'role' => $this->role,
            'teams' => $this->teams,
            'custom' => $this->custom,
            'privacy_settings' => $this->privacySettings,
            'teams_role' => $this->teamsRole,
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
        
        return new static(id: $json['id'] ?? null,
            image: $json['image'] ?? null,
            invisible: $json['invisible'] ?? null,
            language: $json['language'] ?? null,
            name: $json['name'] ?? null,
            role: $json['role'] ?? null,
            teams: $json['teams'] ?? null,
            custom: $json['custom'] ?? null,
            privacySettings: $json['privacy_settings'] ?? null,
            teamsRole: $json['teams_role'] ?? null
        );
    }
} 
