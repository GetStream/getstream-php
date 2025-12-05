<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $total
 * @property int $totalSubscribedDurationSeconds
 * @property int $unique
 */
class SubscriberStatsResponse extends BaseModel
{
    public function __construct(
        public ?int $total = null,
        public ?int $totalSubscribedDurationSeconds = null,
        public ?int $unique = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
