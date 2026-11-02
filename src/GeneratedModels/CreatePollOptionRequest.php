<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CreatePollOptionRequest extends BaseModel
{
    public function __construct(
        public ?string $text = null, // Option text
        public ?object $custom = null, // Custom data for this object
        public ?string $configKey = null, // Key of the moderation configuration to use. Server-side only.
        public ?string $configTeam = null, // Team associated with the configuration. Server-side only.
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
