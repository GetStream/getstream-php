<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * A comment with an optional, depth‑limited slice of nested replies.
 */
class ThreadedCommentResponse extends BaseModel
{
    public function __construct(
        public ?int $confidenceScore = null,
        public ?\DateTime $createdAt = null,
        public ?int $downvoteCount = null,
        public ?string $id = null,
        public ?string $objectID = null,
        public ?string $objectType = null,
        public ?int $reactionCount = null,
        public ?int $replyCount = null,
        public ?int $score = null,
        public ?string $status = null, // Status of the comment. One of: active, deleted, removed, hidden
        public ?\DateTime $updatedAt = null,
        public ?int $upvoteCount = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null,
        /** @var array<FeedsReactionResponse>|null */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $ownReactions = null,
        public ?UserResponse $user = null,
        public ?int $controversyScore = null,
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $editedAt = null,
        public ?string $parentID = null,
        public ?string $text = null,
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null,
        /** @var array<FeedsReactionResponse>|null */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $latestReactions = null,
        /** @var array<ThreadedCommentResponse>|null */
        #[ArrayOf(ThreadedCommentResponse::class)]
        public ?array $replies = null, // Slice of nested comments (may be empty).
        public ?object $custom = null,
        public ?RepliesMeta $meta = null,
        public ?ModerationV2Response $moderation = null,
        /** @var array<string, FeedsReactionGroupResponse>|null */
        #[MapOf(FeedsReactionGroupResponse::class)]
        public ?array $reactionGroups = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
