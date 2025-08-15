<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Policy request
 */
class PolicyRequest extends BaseModel
{
    public function __construct(
        public ?string $action = null,
        public ?string $name = null,    // User-friendly policy name 
        public ?bool $owner = null,    // Whether policy applies to resource owner or not 
        public ?int $priority = null,    // Policy priority 
        public ?array $resources = null,    // List of resources to apply policy to 
        public ?array $roles = null,    // List of roles to apply policy to 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
