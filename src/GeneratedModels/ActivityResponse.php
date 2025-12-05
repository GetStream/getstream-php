<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $bookmarkCount
 * @property int $commentCount
 * @property \DateTime $createdAt
 * @property bool $hidden
 * @property string $id
 * @property int $popularity
 * @property bool $preview
 * @property int $reactionCount
 * @property string $restrictReplies
 * @property int $score
 * @property int $shareCount
 * @property string $type
 * @property \DateTime $updatedAt
 * @property string $visibility
 * @property array<Attachment> $attachments
 * @property array<CommentResponse> $comments
 * @property array $feeds
 * @property array $filterTags
 * @property array $interestTags
 * @property array<FeedsReactionResponse> $latestReactions
 * @property array<UserResponse> $mentionedUsers
 * @property array<BookmarkResponse> $ownBookmarks
 * @property array<FeedsReactionResponse> $ownReactions
 * @property array $collections
 * @property object $custom
 * @property array $reactionGroups
 * @property object $searchData
 * @property UserResponse $user
 * @property \DateTime|null $deletedAt
 * @property \DateTime|null $editedAt
 * @property \DateTime|null $expiresAt
 * @property bool|null $isWatched
 * @property string|null $moderationAction
 * @property string|null $text
 * @property string|null $visibilityTag
 * @property FeedResponse|null $currentFeed
 * @property ActivityLocation|null $location
 * @property ModerationV2Response|null $moderation
 * @property NotificationContext|null $notificationContext
 * @property ActivityResponse|null $parent
 * @property PollResponseData|null $poll
 */
class ActivityResponse extends BaseModel
{
    public function __construct(
        public ?int $bookmarkCount = null, // Number of bookmarks on the activity
        public ?int $commentCount = null, // Number of comments on the activity
        public ?\DateTime $createdAt = null, // When the activity was created
        public ?bool $hidden = null, // If this activity is hidden by this user (using activity feedback)
        public ?string $id = null, // Unique identifier for the activity
        public ?int $popularity = null, // Popularity score of the activity
        public ?bool $preview = null, // If this activity is obfuscated for this user. For premium content where you want to show a preview
        public ?int $reactionCount = null, // Number of reactions to the activity
        public ?string $restrictReplies = null, // Controls who can reply to this activity. Values: everyone, people_i_follow, nobody
        public ?int $score = null, // Ranking score for this activity
        public ?int $shareCount = null, // Number of times the activity was shared
        public ?string $type = null, // Type of activity
        public ?\DateTime $updatedAt = null, // When the activity was last updated
        public ?string $visibility = null, // Visibility setting for the activity
        /** @var array<Attachment>|null Media attachments for the activity */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // Media attachments for the activity
        /** @var array<CommentResponse>|null Comments on this activity */
        #[ArrayOf(CommentResponse::class)]
        public ?array $comments = null, // Comments on this activity
        public ?array $feeds = null, // List of feed IDs containing this activity
        public ?array $filterTags = null, // Tags for filtering
        public ?array $interestTags = null, // Tags for user interests
        /** @var array<FeedsReactionResponse>|null Recent reactions to the activity */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $latestReactions = null, // Recent reactions to the activity
        /** @var array<UserResponse>|null Users mentioned in the activity */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null, // Users mentioned in the activity
        /** @var array<BookmarkResponse>|null Current user's bookmarks for this activity */
        #[ArrayOf(BookmarkResponse::class)]
        public ?array $ownBookmarks = null, // Current user's bookmarks for this activity
        /** @var array<FeedsReactionResponse>|null Current user's reactions to this activity */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $ownReactions = null, // Current user's reactions to this activity
        public ?array $collections = null, // Enriched collection data referenced by this activity
        public ?object $custom = null, // Custom data for the activity
        public ?array $reactionGroups = null, // Grouped reactions by type
        public ?object $searchData = null, // Data for search indexing
        public ?UserResponse $user = null,
        public ?\DateTime $deletedAt = null, // When the activity was deleted
        public ?\DateTime $editedAt = null, // When the activity was last edited
        public ?\DateTime $expiresAt = null, // When the activity will expire
        public ?bool $isWatched = null,
        public ?string $moderationAction = null,
        public ?string $text = null, // Text content of the activity
        public ?string $visibilityTag = null, // If visibility is 'tag', this is the tag name
        public ?FeedResponse $currentFeed = null,
        public ?ActivityLocation $location = null,
        public ?ModerationV2Response $moderation = null,
        public ?NotificationContext $notificationContext = null,
        public ?ActivityResponse $parent = null,
        public ?PollResponseData $poll = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
