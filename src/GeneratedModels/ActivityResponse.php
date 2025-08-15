<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ActivityResponse extends BaseModel
{
    public function __construct(
        public ?int $bookmarkCount = null,    // Number of bookmarks on the activity 
        public ?int $commentCount = null,    // Number of comments on the activity 
        public ?\DateTime $createdAt = null,    // When the activity was created 
        public ?string $id = null,    // Unique identifier for the activity 
        public ?int $popularity = null,    // Popularity score of the activity 
        public ?int $reactionCount = null,    // Number of reactions to the activity 
        public ?int $score = null,    // Ranking score for this activity 
        public ?int $shareCount = null,    // Number of times the activity was shared 
        public ?string $type = null,    // Type of activity 
        public ?\DateTime $updatedAt = null,    // When the activity was last updated 
        public ?string $visibility = null,    // Visibility setting for the activity 
        public ?array $attachments = null,    // Media attachments for the activity 
        public ?array $comments = null,    // Comments on this activity 
        public ?array $feeds = null,    // List of feed IDs containing this activity 
        public ?array $filterTags = null,    // Tags for filtering 
        public ?array $interestTags = null,    // Tags for user interests 
        public ?array $latestReactions = null,    // Recent reactions to the activity 
        public ?array $mentionedUsers = null,    // Users mentioned in the activity 
        public ?array $ownBookmarks = null,    // Current user's bookmarks for this activity 
        public ?array $ownReactions = null,    // Current user's reactions to this activity 
        public ?object $custom = null,    // Custom data for the activity 
        public ?array $reactionGroups = null,    // Grouped reactions by type 
        public ?object $searchData = null,    // Data for search indexing 
        public ?UserResponse $user = null,
        public ?\DateTime $deletedAt = null,    // When the activity was deleted 
        public ?\DateTime $editedAt = null,    // When the activity was last edited 
        public ?\DateTime $expiresAt = null,    // When the activity will expire 
        public ?bool $hidden = null,
        public ?string $text = null,    // Text content of the activity 
        public ?string $visibilityTag = null,    // If visibility is 'tag', this is the tag name 
        public ?FeedResponse $currentFeed = null,
        public ?ActivityLocation $location = null,
        public ?ModerationV2Response $moderation = null,
        public ?object $notificationContext = null,    // Notification context data for the activity (if this is a reaction, comment, follow, etc.) 
        public ?ActivityResponse $parent = null,
        public ?PollResponseData $poll = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
