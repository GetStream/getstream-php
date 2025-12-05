<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<FollowRequest> $follows
 */
class FollowBatchRequest extends BaseModel
{
    public function __construct(
        /** @var array<FollowRequest>|null List of follow relationships to create */
        #[ArrayOf(FollowRequest::class)]
        public ?array $follows = null, // List of follow relationships to create
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
