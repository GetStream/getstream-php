<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PublisherStatsResponse extends BaseModel
{
    public function __construct(
        public ?int $total = null,
        public ?int $unique = null,
        public ?array $byTrack = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
