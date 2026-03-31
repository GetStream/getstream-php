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
        public ?string $text = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $editedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $expiresAt = null,
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null,
        /** @var array<FeedsV3CommentResponse>|null */
        #[ArrayOf(FeedsV3CommentResponse::class)]
        public ?array $comments = null,
        public ?object $custom = null,
        public ?object $searchData = null,
        public ?array $filterTags = null,
        public ?array $interestTags = null,
        /** @var array<string, EnrichedCollection>|null */
        #[MapOf(EnrichedCollection::class)]
        public ?array $collections = null,
        public ?ModerationV2Response $moderation = null,
        public ?string $moderationAction = null,
        public ?int $popularity = null,
        public ?int $commentCount = null,
        public ?int $bookmarkCount = null,
        public ?int $shareCount = null,
        public ?int $reactionCount = null,
        public ?int $score = null,
        public ?array $metrics = null,
        public ?array $latestReactions = null,
        /** @var array<string, FeedsReactionGroup>|null */
        #[MapOf(FeedsReactionGroup::class)]
        public ?array $reactionGroups = null,
        public ?array $ownReactions = null,
        public ?array $ownBookmarks = null,
        public ?bool $hidden = null,
        public ?bool $preview = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
