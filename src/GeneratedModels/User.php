<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class User extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?\DateTime $banExpires = null,
        public ?bool $banned = null,
        public ?bool $invisible = null,
        public ?string $language = null,
        public ?\DateTime $revokeTokensIssuedBefore = null,
        public ?string $role = null,
        public ?array $teams = null,
        public ?object $custom = null,
        public ?PrivacySettings $privacySettings = null,
        public ?array $teamsRole = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
