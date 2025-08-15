<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
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
        public ?string $status = null,
        public ?\DateTime $updatedAt = null,
        public ?int $upvoteCount = null,
        public ?array $mentionedUsers = null,
        public ?array $ownReactions = null,
        public ?UserResponse $user = null,
        public ?int $controversyScore = null,
        public ?\DateTime $deletedAt = null,
        public ?string $parentID = null,
        public ?string $text = null,
        public ?array $attachments = null,
        public ?array $latestReactions = null,
        public ?array $replies = null,    // Slice of nested comments (may be empty). 
        public ?object $custom = null,
        public ?RepliesMeta $meta = null,
        public ?ModerationV2Response $moderation = null,
        public ?array $reactionGroups = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
