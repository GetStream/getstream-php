<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $userID
 * @property array|null $unset
 * @property object|null $set
 * @property UserRequest|null $user
 */
class UpdateChannelPartialRequest extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        public ?array $unset = null,
        public ?object $set = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
