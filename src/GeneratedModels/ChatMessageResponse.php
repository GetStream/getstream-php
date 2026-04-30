<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChatMessageResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $text = null,
        public ?string $html = null,
        public ?string $type = null,
        public ?string $cid = null,
        public ?UserResponse $user = null,
        public ?object $custom = null,
        public ?int $replyCount = null,
        public ?int $deletedReplyCount = null,
        public ?bool $shadowed = null,
        public ?bool $silent = null,
        public ?bool $pinned = null,
        public ?bool $mentionedChannel = null,
        public ?bool $mentionedHere = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $pinnedAt = null,
        public ?UserResponse $pinnedBy = null,
        public ?\DateTime $pinExpires = null,
        public ?\DateTime $messageTextUpdatedAt = null,
        public ?ChatMessageResponse $quotedMessage = null,
        public ?string $quotedMessageID = null,
        public ?string $parentID = null,
        public ?bool $showInChannel = null,
        public ?string $command = null,
        public ?string $mml = null,
        public ?string $pollID = null,
        public ?array $attachments = null,
        public ?array $latestReactions = null,
        public ?array $ownReactions = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null,
        public ?array $i18n = null,
        public ?array $imageLabels = null,
        public ?array $restrictedVisibility = null,
        public ?array $reactionCounts = null,
        public ?array $reactionScores = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
