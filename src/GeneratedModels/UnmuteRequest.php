<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array $targetIds
 * @property string|null $userID
 * @property UserRequest|null $user
 */
class UnmuteRequest extends BaseModel
{
    public function __construct(
        public ?array $targetIds = null, // User IDs to unmute
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
