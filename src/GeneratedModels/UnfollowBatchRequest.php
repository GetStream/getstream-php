<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<FollowPair> $follows
 */
class UnfollowBatchRequest extends BaseModel
{
    public function __construct(
        /** @var array<FollowPair>|null List of follow relationships to remove */
        #[ArrayOf(FollowPair::class)]
        public ?array $follows = null, // List of follow relationships to remove
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
