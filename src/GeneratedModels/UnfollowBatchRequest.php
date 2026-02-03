<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<FollowPair> $follows
 * @property bool|null $deleteNotificationActivity
 */
class UnfollowBatchRequest extends BaseModel
{
    public function __construct(
        /** @var array<FollowPair>|null List of follow relationships to remove */
        #[ArrayOf(FollowPair::class)]
        public ?array $follows = null, // List of follow relationships to remove
        public ?bool $deleteNotificationActivity = null, // Whether to delete the corresponding notification activity (default: false)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
