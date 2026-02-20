<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * A comment with an optional, depth‑limited slice of nested replies.
 */
class ThreadedCommentResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $objectID = null,
        public ?string $objectType = null,
        public ?UserResponse $user = null,
        public ?string $text = null,
        public ?object $custom = null,
        public ?string $parentID = null,
        public ?int $reactionCount = null,
        /** @var array<FeedsReactionResponse>|null */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $latestReactions = null,
        /** @var array<string, FeedsReactionGroupResponse>|null */
        #[MapOf(FeedsReactionGroupResponse::class)]
        public ?array $reactionGroups = null,
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null,
        public ?string $status = null, // Status of the comment. One of: active, deleted, removed, hidden
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $editedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?ModerationV2Response $moderation = null,
        public ?int $replyCount = null,
        public ?int $upvoteCount = null,
        public ?int $downvoteCount = null,
        public ?int $score = null,
        public ?int $confidenceScore = null,
        public ?int $controversyScore = null,
        /** @var array<FeedsReactionResponse>|null */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $ownReactions = null,
        public ?RepliesMeta $meta = null,
        /** @var array<ThreadedCommentResponse>|null */
        #[ArrayOf(ThreadedCommentResponse::class)]
        public ?array $replies = null, // Slice of nested comments (may be empty).
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
