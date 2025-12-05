<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property PublisherAllMetrics|null $all
 */
class PublishersMetrics extends BaseModel
{
    public function __construct(
        public ?PublisherAllMetrics $all = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
