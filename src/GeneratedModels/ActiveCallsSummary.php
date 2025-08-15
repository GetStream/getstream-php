<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ActiveCallsSummary extends BaseModel
{
    public function __construct(
        public ?int $activeCalls = null,
        public ?int $activePublishers = null,
        public ?int $activeSubscribers = null,
        public ?int $participants = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
