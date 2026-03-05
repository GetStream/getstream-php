<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PinActivityRequest extends BaseModel
{
    public function __construct(
        public ?bool $enrichOwnFields = null, // If true, enriches the activity's current_feed with own_* fields (own_follows, own_followings, own_capabilities, own_membership). Defaults to false for performance.
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
