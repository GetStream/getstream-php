<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property JoinCallAPIMetrics|null $joinCallAPI
 * @property PublishersMetrics|null $publishers
 * @property SubscribersMetrics|null $subscribers
 */
class ActiveCallsMetrics extends BaseModel
{
    public function __construct(
        public ?JoinCallAPIMetrics $joinCallAPI = null,
        public ?PublishersMetrics $publishers = null,
        public ?SubscribersMetrics $subscribers = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
