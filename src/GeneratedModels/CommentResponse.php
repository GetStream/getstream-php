<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $confidenceScore
 * @property \DateTime $createdAt
 * @property int $downvoteCount
 * @property string $id
 * @property string $objectID
 * @property string $objectType
 * @property int $reactionCount
 * @property int $replyCount
 * @property int $score
 * @property string $status
 * @property \DateTime $updatedAt
 * @property int $upvoteCount
 * @property array<UserResponse> $mentionedUsers
 * @property array<FeedsReactionResponse> $ownReactions
 * @property UserResponse $user
 * @property int|null $controversyScore
 * @property \DateTime|null $deletedAt
 * @property string|null $parentID
 * @property string|null $text
 * @property array<Attachment>|null $attachments
 * @property array<FeedsReactionResponse>|null $latestReactions
 * @property object|null $custom
 * @property ModerationV2Response|null $moderation
 * @property array|null $reactionGroups
 */
class CommentResponse extends BaseModel
{
    public function __construct(
        public ?int $confidenceScore = null, // Confidence score of the comment
        public ?\DateTime $createdAt = null, // When the comment was created
        public ?int $downvoteCount = null, // Number of downvotes for this comment
        public ?string $id = null, // Unique identifier for the comment
        public ?string $objectID = null, // ID of the object this comment is associated with
        public ?string $objectType = null, // Type of the object this comment is associated with
        public ?int $reactionCount = null, // Number of reactions to this comment
        public ?int $replyCount = null, // Number of replies to this comment
        public ?int $score = null, // Score of the comment based on reactions
        public ?string $status = null, // Status of the comment (e.g., active, deleted)
        public ?\DateTime $updatedAt = null, // When the comment was last updated
        public ?int $upvoteCount = null, // Number of upvotes for this comment
        /** @var array<UserResponse>|null Users mentioned in the comment */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null, // Users mentioned in the comment
        /** @var array<FeedsReactionResponse>|null Current user's reactions to this activity */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $ownReactions = null, // Current user's reactions to this activity
        public ?UserResponse $user = null,
        public ?int $controversyScore = null, // Controversy score of the comment
        public ?\DateTime $deletedAt = null, // When the comment was deleted
        public ?string $parentID = null, // ID of parent comment for nested replies
        public ?string $text = null, // Text content of the comment
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null,
        /** @var array<FeedsReactionResponse>|null Recent reactions to the comment */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $latestReactions = null, // Recent reactions to the comment
        public ?object $custom = null, // Custom data for the comment
        public ?ModerationV2Response $moderation = null,
        public ?array $reactionGroups = null, // Grouped reactions by type
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
