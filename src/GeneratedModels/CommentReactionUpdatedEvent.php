<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a reaction is updated on a comment.
 *
 * @property \DateTime $createdAt
 * @property string $fid
 * @property ActivityResponse $activity
 * @property CommentResponse $comment
 * @property object $custom
 * @property FeedsReactionResponse $reaction
 * @property string $type
 * @property string|null $feedVisibility
 * @property \DateTime|null $receivedAt
 * @property UserResponseCommonFields|null $user
 */
class CommentReactionUpdatedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $fid = null,
        public ?ActivityResponse $activity = null,
        public ?CommentResponse $comment = null,
        public ?object $custom = null,
        public ?FeedsReactionResponse $reaction = null,
        public ?string $type = null, // The type of event: "feeds.comment.reaction.updated" in this case
        public ?string $feedVisibility = null,
        public ?\DateTime $receivedAt = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
