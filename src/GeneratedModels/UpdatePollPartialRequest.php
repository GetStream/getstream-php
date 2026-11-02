<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdatePollPartialRequest extends BaseModel
{
    public function __construct(
        public ?string $configKey = null, // Key of the moderation configuration to use. Server-side only.
        public ?string $configTeam = null, // Team associated with the configuration. Server-side only.
        public ?object $set = null, // Sets new field values
        public ?array $unset = null, // Array of field names to unset
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
