<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MuteResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?array $mutes = null,
        public ?array $nonExistingUsers = null,
        public ?OwnUser $ownUser = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'mutes' => $this->mutes,
            'non_existing_users' => $this->nonExistingUsers,
            'own_user' => $this->ownUser,
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
        
        return new static(duration: $json['duration'] ?? null,
            mutes: $json['mutes'] ?? null,
            nonExistingUsers: $json['non_existing_users'] ?? null,
            ownUser: $json['own_user'] ?? null
        );
    }
} 
