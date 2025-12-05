<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * MemberRequest is the payload for adding a member to a call.
 *
 * @property string $userID
 * @property string|null $role
 * @property object|null $custom
 */
class MemberRequest extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        public ?string $role = null,
        public ?object $custom = null, // Custom data for this object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
