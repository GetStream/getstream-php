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
        public ?Location $location = null,
        public ?bool $clearLocation = null, // If true, removes the geographic location from the feed
        public ?array $filterTags = null, // Tags used for filtering feeds
        public ?bool $enrichOwnFields = null, // If true, enriches the feed with own_* fields (own_follows, own_followings, own_capabilities, own_membership). Defaults to false for performance.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
