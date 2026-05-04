<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedRequest extends BaseModel
{
    public function __construct(
        public ?string $feedGroupID = null, // ID of the feed group
        public ?string $feedID = null, // ID of the feed
        public ?string $createdByID = null, // ID of the feed creator
        public ?string $name = null, // Name of the feed
        public ?string $description = null, // Description of the feed
        public ?string $visibility = null, // Visibility setting for the feed. One of: public, visible, followers, members, private
        public ?object $custom = null, // Custom data for the feed
        public ?Location $location = null,
        public ?array $filterTags = null, // Tags used for filtering feeds
        /** @var array<FeedMemberRequest>|null */
        #[ArrayOf(FeedMemberRequest::class)]
        public ?array $members = null, // Initial members for the feed
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
