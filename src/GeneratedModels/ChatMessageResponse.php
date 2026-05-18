<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChatMessageResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $text = null,
        public ?string $mml = null,
        public ?string $command = null,
        public ?string $html = null,
        public ?string $type = null,
        public ?UserResponse $user = null,
        public ?ChannelMemberResponse $member = null,
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null,
        /** @var array<ChatReactionResponse>|null */
        #[ArrayOf(ChatReactionResponse::class)]
        public ?array $latestReactions = null,
        /** @var array<ChatReactionResponse>|null */
        #[ArrayOf(ChatReactionResponse::class)]
        public ?array $ownReactions = null,
        public ?array $reactionCounts = null,
        public ?array $reactionScores = null,
        /** @var array<string, ChatReactionGroupResponse>|null */
        #[MapOf(ChatReactionGroupResponse::class)]
        public ?array $reactionGroups = null,
        public ?string $parentID = null,
        public ?bool $showInChannel = null,
        public ?int $replyCount = null,
        public ?int $deletedReplyCount = null,
        public ?string $quotedMessageID = null,
        public ?ChatMessageResponse $quotedMessage = null,
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
        public ?array $mentionedRoles = null,
        public ?array $mentionedGroupIds = null,
        public ?bool $mentionedChannel = null,
        public ?bool $mentionedHere = null,
        public ?array $i18n = null,
        public ?bool $silent = null,
        public ?bool $pinned = null,
        public ?\DateTime $pinnedAt = null,
        public ?UserResponse $pinnedBy = null,
        public ?\DateTime $pinExpires = null,
        public ?\DateTime $messageTextUpdatedAt = null,
        public ?string $pollID = null,
        public ?PollResponseData $poll = null,
        public ?ChatModerationV2Response $moderation = null,
        public ?array $restrictedVisibility = null,
        public ?ChatDraftResponse $draft = null,
        public ?ChatReminderResponseData $reminder = null,
        public ?ChatSharedLocationResponseData $sharedLocation = null,
        public ?bool $deletedForMe = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
