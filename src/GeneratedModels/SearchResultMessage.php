<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SearchResultMessage extends BaseModel
{
    public function __construct(
        public ?ChannelResponse $channel = null,
        public ?DraftResponse $draft = null,
        public ?ChannelMemberResponse $member = null,
        public ?ModerationV2Response $moderation = null,
        public ?UserResponse $pinnedBy = null,
        public ?PollResponseData $poll = null,
        public ?MessageResponse $quotedMessage = null,
        public ?ReminderResponseData $reminder = null,
        public ?SharedLocationResponseData $sharedLocation = null,
        public ?UserResponse $user = null,
        public ?string $id = null,
        public ?string $text = null,
        public ?string $mml = null,
        public ?string $command = null,
        public ?string $html = null,
        public ?string $type = null,
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null,
        /** @var array<ReactionResponse>|null */
        #[ArrayOf(ReactionResponse::class)]
        public ?array $latestReactions = null,
        /** @var array<ReactionResponse>|null */
        #[ArrayOf(ReactionResponse::class)]
        public ?array $ownReactions = null,
        public ?array $reactionCounts = null,
        public ?array $reactionScores = null,
        /** @var array<string, ReactionGroupResponse>|null */
        #[MapOf(ReactionGroupResponse::class)]
        public ?array $reactionGroups = null,
        public ?string $parentID = null,
        public ?bool $showInChannel = null,
        public ?int $replyCount = null,
        public ?int $deletedReplyCount = null,
        public ?string $quotedMessageID = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $threadParticipants = null,
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?object $custom = null,
        public ?bool $shadowed = null,
        public ?array $imageLabels = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null,
        public ?bool $mentionedChannel = null,
        public ?bool $mentionedHere = null,
        public ?array $i18n = null,
        public ?bool $silent = null,
        public ?bool $pinned = null,
        public ?\DateTime $pinnedAt = null,
        public ?\DateTime $pinExpires = null,
        public ?\DateTime $messageTextUpdatedAt = null,
        public ?string $pollID = null,
        public ?array $restrictedVisibility = null,
        public ?bool $deletedForMe = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
