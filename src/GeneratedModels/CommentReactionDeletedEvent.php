<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a reaction is deleted from a comment.
 *
 * @property \DateTime $createdAt
 * @property string $fid
 * @property CommentResponse $comment
 * @property object $custom
 * @property FeedsReactionResponse $reaction
 * @property string $type
 * @property string|null $feedVisibility
 * @property \DateTime|null $receivedAt
 */
class CommentReactionDeletedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $fid = null,
        public ?CommentResponse $comment = null,
        public ?object $custom = null,
        public ?FeedsReactionResponse $reaction = null,
        public ?string $type = null, // The type of reaction that was removed
        public ?string $feedVisibility = null,
        public ?\DateTime $receivedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
