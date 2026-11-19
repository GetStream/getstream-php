<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PublishConfigVersionRequest extends BaseModel
{
    public function __construct(
        public ?string $team = null, // Team associated with the configuration
        public ?string $userID = null, // Optional user ID to associate with the audit log entry
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
