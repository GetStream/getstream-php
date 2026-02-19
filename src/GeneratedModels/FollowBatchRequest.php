<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FollowBatchRequest extends BaseModel
{
    public function __construct(
        /** @var array<FollowRequest>|null */
        #[ArrayOf(FollowRequest::class)]
        public ?array $follows = null, // List of follow relationships to create
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
