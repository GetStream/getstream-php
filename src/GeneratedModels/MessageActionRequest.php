<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array $formData
 * @property string|null $userID
 * @property UserRequest|null $user
 */
class MessageActionRequest extends BaseModel
{
    public function __construct(
        public ?array $formData = null, // ReadOnlyData to execute command with
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
