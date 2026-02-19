<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateFeedRequest extends BaseModel
{
    public function __construct(
        public ?string $createdByID = null, // ID of the new feed creator (owner)
        public ?string $name = null, // Name of the feed
        public ?string $description = null, // Description of the feed
        public ?object $custom = null, // Custom data for the feed
        public ?array $filterTags = null, // Tags used for filtering feeds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
