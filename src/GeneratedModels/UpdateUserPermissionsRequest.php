<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateUserPermissionsRequest implements JsonSerializable
{
    public function __construct(public ?string $userID = null,
        public ?array $grantPermissions = null,
        public ?array $revokePermissions = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'user_id' => $this->userID,
            'grant_permissions' => $this->grantPermissions,
            'revoke_permissions' => $this->revokePermissions,
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
        
        return new static(userID: $json['user_id'] ?? null,
            grantPermissions: $json['grant_permissions'] ?? null,
            revokePermissions: $json['revoke_permissions'] ?? null
        );
    }
} 
