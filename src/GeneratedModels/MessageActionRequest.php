<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class MessageActionRequest extends BaseModel
{
    public function __construct(
        public ?UserRequest $user = null,
        public ?array $formData = null, // ReadOnlyData to execute command with
        public ?string $userID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
