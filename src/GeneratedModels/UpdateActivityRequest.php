<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateActivityRequest extends BaseModel
{
    public function __construct(
        public ?\DateTime $expiresAt = null,    // Time when the activity will expire 
        public ?string $pollID = null,    // Poll ID 
        public ?string $restrictReplies = null,    // Controls who can add comments/replies to this activity. Options: 'everyone' (default - anyone can reply), 'people_i_follow' (only people the activity creator follows can reply), 'nobody' (no one can reply) 
        public ?bool $skipEnrichUrl = null,    // Whether to skip URL enrichment for the activity 
        public ?string $text = null,    // The text content of the activity 
        public ?string $userID = null,
        public ?string $visibility = null,    // Visibility setting for the activity 
        public ?array $attachments = null,    // List of attachments for the activity 
        public ?array $collectionRefs = null,    // Collections that this activity references 
        public ?array $feeds = null,    // List of feeds the activity is present in 
        public ?array $filterTags = null,    // Tags used for filtering the activity 
        public ?array $interestTags = null,    // Tags indicating interest categories 
        public ?object $custom = null,    // Custom data for the activity 
        public ?ActivityLocation $location = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
