<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SearchResultMessage extends BaseModel
{
    public function __construct(
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?int $deletedReplyCount = null,
        public ?string $html = null,
        public ?string $id = null,
        public ?bool $pinned = null,
        public ?int $replyCount = null,
        public ?bool $shadowed = null,
        public ?bool $silent = null,
        public ?string $text = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?array $attachments = null,
        public ?array $latestReactions = null,
        public ?array $mentionedUsers = null,
        public ?array $ownReactions = null,
        public ?array $restrictedVisibility = null,
        public ?object $custom = null,
        public ?array $reactionCounts = null,
        public ?array $reactionScores = null,
        public ?UserResponse $user = null,
        public ?string $command = null,
        public ?\DateTime $deletedAt = null,
        public ?bool $deletedForMe = null,
        public ?\DateTime $messageTextUpdatedAt = null,
        public ?string $mml = null,
        public ?string $parentID = null,
        public ?\DateTime $pinExpires = null,
        public ?\DateTime $pinnedAt = null,
        public ?string $pollID = null,
        public ?string $quotedMessageID = null,
        public ?bool $showInChannel = null,
        public ?array $threadParticipants = null,
        public ?ChannelResponse $channel = null,
        public ?DraftResponse $draft = null,
        public ?array $i18n = null,
        public ?array $imageLabels = null,
        public ?ChannelMemberResponse $member = null,
        public ?ModerationV2Response $moderation = null,
        public ?UserResponse $pinnedBy = null,
        public ?PollResponseData $poll = null,
        public ?MessageResponse $quotedMessage = null,
        public ?array $reactionGroups = null,
        public ?ReminderResponseData $reminder = null,
        public ?SharedLocationResponseData $sharedLocation = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
