<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<FollowResponse> $follows
 */
class UnfollowBatchResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<FollowResponse>|null List of follow relationships that were removed */
        #[ArrayOf(FollowResponse::class)]
        public ?array $follows = null, // List of follow relationships that were removed
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
