<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedsV3ActivityResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?UserResponse $user = null,
        public ?array $feeds = null,
        public ?string $visibility = null,
        public ?string $visibilityTag = null,
        public ?string $restrictReplies = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null,
        public ?object $custom = null,
        public ?FeedsNotificationContext $notificationContext = null,
        public ?int $popularity = null,
        public ?float $score = null,
        public ?object $scoreVars = null,
        public ?string $selectorSource = null,
        /** @var array<FeedsV3CommentResponse>|null */
        #[ArrayOf(FeedsV3CommentResponse::class)]
        public ?array $comments = null,
        public ?string $text = null,
        public ?FeedsActivityLocation $location = null,
        public ?FeedsV3ActivityResponse $parent = null,
        public ?PollResponseData $poll = null,
        public ?\DateTime $editedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $expiresAt = null,
        public ?object $searchData = null,
        public ?array $filterTags = null,
        public ?array $interestTags = null,
        public ?ModerationV2Response $moderation = null,
        public ?string $moderationAction = null,
        public ?int $commentCount = null,
        public ?int $bookmarkCount = null,
        public ?int $shareCount = null,
        public ?int $reactionCount = null,
        public ?array $metrics = null,
        /** @var array<FeedsReactionResponse>|null */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $latestReactions = null,
        /** @var array<string, FeedsReactionGroupResponse>|null */
        #[MapOf(FeedsReactionGroupResponse::class)]
        public ?array $reactionGroups = null,
        /** @var array<FeedsReactionResponse>|null */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $ownReactions = null,
        /** @var array<FeedsBookmarkResponse>|null */
        #[ArrayOf(FeedsBookmarkResponse::class)]
        public ?array $ownBookmarks = null,
        /** @var array<string, FeedsEnrichedCollectionResponse>|null */
        #[MapOf(FeedsEnrichedCollectionResponse::class)]
        public ?array $collections = null,
        /** @var array<FeedsReactionResponse>|null */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $friendReactions = null,
        public ?int $friendReactionCount = null,
        public ?FeedsFeedResponse $currentFeed = null,
        public ?bool $hidden = null,
        public ?bool $preview = null,
        public ?bool $isWatched = null,
        public ?bool $isSeen = null,
        public ?bool $isRead = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
