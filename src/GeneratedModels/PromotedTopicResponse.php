<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * A set of topics promoted for the For You trend signal until it expires
 */
class PromotedTopicResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // The ID of the promotion
        public ?array $tags = null, // The promoted topic tags
        public ?float $weight = null, // The trend weight the tags get, between 0 and 1
        public ?\DateTime $startsAt = null, // When the promotion started
        public ?\DateTime $expiresAt = null, // When the promotion expires
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
