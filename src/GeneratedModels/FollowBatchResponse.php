<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class FollowBatchResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<FollowResponse>|null */
        #[ArrayOf(FollowResponse::class)]
        public ?array $created = null, // List of newly created follow relationships
        /** @var array<FollowResponse>|null */
        #[ArrayOf(FollowResponse::class)]
        public ?array $follows = null, // List of current follow relationships
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
