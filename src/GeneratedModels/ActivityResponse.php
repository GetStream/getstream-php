<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ActivityResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Unique identifier for the activity
        public ?string $type = null, // Type of activity
        public ?UserResponse $user = null,
        public ?array $feeds = null, // List of feed IDs containing this activity
        public ?string $visibility = null, // Visibility setting for the activity. One of: public, private, tag
        public ?string $visibilityTag = null, // If visibility is 'tag', this is the tag name
        public ?string $restrictReplies = null, // Controls who can add comments/replies to this activity. One of: everyone, people_i_follow, nobody
        public ?\DateTime $createdAt = null, // When the activity was created
        public ?\DateTime $updatedAt = null, // When the activity was last updated
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // Media attachments for the activity
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null, // Users mentioned in the activity
        public ?object $custom = null, // Custom data for the activity
        public ?NotificationContext $notificationContext = null,
        public ?int $popularity = null, // Popularity score of the activity
        public ?int $score = null, // Ranking score for this activity
        public ?string $selectorSource = null, // Which activity selector provided this activity (e.g., 'following', 'popular', 'interest'). Only set when using multiple activity selectors with ranking.
        /** @var array<CommentResponse>|null */
        #[ArrayOf(CommentResponse::class)]
        public ?array $comments = null, // Latest 5 comments of this activity (comment replies excluded)
        public ?string $text = null, // Text content of the activity
        public ?ActivityLocation $location = null,
        public ?ActivityResponse $parent = null,
        public ?PollResponseData $poll = null,
        public ?\DateTime $editedAt = null, // When the activity was last edited
        public ?\DateTime $deletedAt = null, // When the activity was deleted
        public ?\DateTime $expiresAt = null, // When the activity will expire
        public ?object $searchData = null, // Data for search indexing
        public ?array $filterTags = null, // Tags for filtering
        public ?array $interestTags = null, // Tags for user interests
        public ?ModerationV2Response $moderation = null,
        public ?string $moderationAction = null,
        public ?int $commentCount = null, // Number of comments on the activity
        public ?int $bookmarkCount = null, // Number of bookmarks on the activity
        public ?int $shareCount = null, // Number of times the activity was shared
        public ?int $reactionCount = null, // Number of reactions to the activity
        /** @var array<FeedsReactionResponse>|null */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $latestReactions = null, // Recent reactions to the activity
        /** @var array<string, FeedsReactionGroupResponse>|null */
        #[MapOf(FeedsReactionGroupResponse::class)]
        public ?array $reactionGroups = null, // Grouped reactions by type
        /** @var array<FeedsReactionResponse>|null */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $ownReactions = null, // Current user's reactions to this activity
        /** @var array<BookmarkResponse>|null */
        #[ArrayOf(BookmarkResponse::class)]
        public ?array $ownBookmarks = null, // Current user's bookmarks for this activity
        /** @var array<string, EnrichedCollectionResponse>|null */
        #[MapOf(EnrichedCollectionResponse::class)]
        public ?array $collections = null, // Enriched collection data referenced by this activity
        /** @var array<FeedsReactionResponse>|null */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $friendReactions = null, // Reactions from users the current user follows or has mutual follows with
        public ?int $friendReactionCount = null, // Total count of reactions from friends on this activity
        public ?FeedResponse $currentFeed = null,
        public ?bool $hidden = null, // If this activity is hidden by this user (using activity feedback)
        public ?bool $preview = null, // If this activity is obfuscated for this user. For premium content where you want to show a preview
        public ?bool $isWatched = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
