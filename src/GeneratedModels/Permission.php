<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Permission extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Unique permission ID
        public ?string $name = null, // Name of the permission
        public ?string $description = null, // Description of the permission
        public ?string $action = null, // Action name this permission is for (e.g. SendMessage)
        public ?bool $owner = null, // Whether this permission applies to resource owner or not
        public ?bool $sameTeam = null, // Whether this permission applies to teammates (multi-tenancy mode only)
        public ?object $condition = null, // MongoDB style condition which decides whether or not the permission is granted
        public ?bool $custom = null, // Whether this is a custom permission or built-in
        public ?string $level = null, // Level at which permission could be applied (app or channel). One of: app, channel
        public ?array $tags = null, // List of tags of the permission
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
