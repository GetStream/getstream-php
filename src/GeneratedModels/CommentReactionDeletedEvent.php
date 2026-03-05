<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a reaction is deleted from a comment.
 */
class CommentReactionDeletedEvent extends BaseModel
{
    public function __construct(
        public ?CommentResponse $comment = null,
        public ?FeedsReactionResponse $reaction = null,
        public ?string $type = null, // The type of reaction that was removed
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $fid = null,
        public ?string $feedVisibility = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
