<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Promotes topic tags for the trend signal of feed groups with for_you.trending. An app holds at most 20 active promotions.
 */
class PromoteTopicsRequest extends BaseModel
{
    public function __construct(
        public ?array $tags = null, // The tags to promote (1-10, each at most 255 characters)
        public ?float $weight = null, // The trend weight of the tags, above 0 and at most 1. Defaults to 1
        public ?int $ttl = null, // How long the promotion lasts, in seconds (60-86400)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
