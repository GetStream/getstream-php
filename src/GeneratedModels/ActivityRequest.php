<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $type
 * @property array $feeds
 * @property string|null $expiresAt
 * @property string|null $id
 * @property string|null $parentID
 * @property string|null $pollID
 * @property string|null $restrictReplies
 * @property bool|null $skipEnrichUrl
 * @property string|null $text
 * @property string|null $userID
 * @property string|null $visibility
 * @property string|null $visibilityTag
 * @property array<Attachment>|null $attachments
 * @property array|null $collectionRefs
 * @property array|null $filterTags
 * @property array|null $interestTags
 * @property array|null $mentionedUserIds
 * @property object|null $custom
 * @property ActivityLocation|null $location
 * @property object|null $searchData
 */
class ActivityRequest extends BaseModel
{
    public function __construct(
        public ?string $type = null, // Type of activity
        public ?array $feeds = null, // List of feed IDs to add the activity to
        public ?string $expiresAt = null, // Expiration time for the activity
        public ?string $id = null, // Optional ID for the activity
        public ?string $parentID = null, // ID of parent activity for replies/comments
        public ?string $pollID = null, // ID of a poll to attach to activity
        public ?string $restrictReplies = null, // Controls who can add comments/replies to this activity. Options: 'everyone' (default - anyone can reply), 'people_i_follow' (only people the activity creator follows can reply), 'nobody' (no one can reply)
        public ?bool $skipEnrichUrl = null, // Whether to skip URL enrichment for the activity
        public ?string $text = null, // Text content of the activity
        public ?string $userID = null, // ID of the user creating the activity
        public ?string $visibility = null, // Visibility setting for the activity
        public ?string $visibilityTag = null, // If visibility is 'tag', this is the tag name and is required
        /** @var array<Attachment>|null List of attachments for the activity */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // List of attachments for the activity
        public ?array $collectionRefs = null, // Collections that this activity references
        public ?array $filterTags = null, // Tags for filtering activities
        public ?array $interestTags = null, // Tags for indicating user interests
        public ?array $mentionedUserIds = null, // List of users mentioned in the activity
        public ?object $custom = null, // Custom data for the activity
        public ?ActivityLocation $location = null,
        public ?object $searchData = null, // Additional data for search indexing
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
