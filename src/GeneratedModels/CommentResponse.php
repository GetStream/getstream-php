<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CommentResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Unique identifier for the comment
        public ?string $objectID = null, // ID of the object this comment is associated with
        public ?string $objectType = null, // Type of the object this comment is associated with
        public ?UserResponse $user = null,
        public ?string $text = null, // Text content of the comment
        public ?object $custom = null, // Custom data for the comment
        public ?string $parentID = null, // ID of parent comment for nested replies
        public ?int $reactionCount = null, // Number of reactions to this comment
        /** @var array<FeedsReactionResponse>|null */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $latestReactions = null, // Recent reactions to the comment
        /** @var array<string, FeedsReactionGroupResponse>|null */
        #[MapOf(FeedsReactionGroupResponse::class)]
        public ?array $reactionGroups = null, // Grouped reactions by type
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // Attachments associated with the comment
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null, // Users mentioned in the comment
        public ?string $status = null, // Status of the comment. One of: active, deleted, removed, hidden
        public ?\DateTime $createdAt = null, // When the comment was created
        public ?\DateTime $updatedAt = null, // When the comment was last updated
        public ?\DateTime $editedAt = null, // When the comment was last edited
        public ?\DateTime $deletedAt = null, // When the comment was deleted
        public ?ModerationV2Response $moderation = null,
        public ?int $replyCount = null, // Number of replies to this comment
        public ?int $upvoteCount = null, // Number of upvotes for this comment
        public ?int $downvoteCount = null, // Number of downvotes for this comment
        public ?int $bookmarkCount = null,
        public ?int $score = null, // Score of the comment based on reactions
        public ?float $confidenceScore = null, // Confidence score of the comment
        public ?float $controversyScore = null, // Controversy score of the comment
        /** @var array<FeedsReactionResponse>|null */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $ownReactions = null, // Current user's reactions to this activity
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
