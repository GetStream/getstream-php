<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property SubscriberAllMetrics|null $all
 */
class SubscribersMetrics extends BaseModel
{
    public function __construct(
        public ?SubscriberAllMetrics $all = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
