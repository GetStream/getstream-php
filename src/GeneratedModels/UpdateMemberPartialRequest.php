<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateMemberPartialRequest extends BaseModel
{
    public function __construct(
        public ?object $set = null,
        public ?array $unset = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
