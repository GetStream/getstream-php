<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedRequest extends BaseModel
{
    public function __construct(
        public ?string $feedGroupID = null,    // ID of the feed group 
        public ?string $feedID = null,    // ID of the feed 
        public ?string $createdByID = null,    // ID of the feed creator 
        public ?string $description = null,    // Description of the feed 
        public ?string $name = null,    // Name of the feed 
        public ?string $visibility = null,    // Visibility setting for the feed 
        public ?array $filterTags = null,    // Tags used for filtering feeds 
        public ?array $members = null,    // Initial members for the feed 
        public ?object $custom = null,    // Custom data for the feed 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
