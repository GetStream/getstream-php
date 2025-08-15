<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ActiveCallsMetrics extends BaseModel
{
    public function __construct(
        public ?JoinCallAPIMetrics $joinCallAPI = null,
        public ?PublishersMetrics $publishers = null,
        public ?SubscribersMetrics $subscribers = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
