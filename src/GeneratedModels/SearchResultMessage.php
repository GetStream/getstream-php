<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $cid
 * @property \DateTime $createdAt
 * @property int $deletedReplyCount
 * @property string $html
 * @property string $id
 * @property bool $pinned
 * @property int $replyCount
 * @property bool $shadowed
 * @property bool $silent
 * @property string $text
 * @property string $type
 * @property \DateTime $updatedAt
 * @property array<Attachment> $attachments
 * @property array<ReactionResponse> $latestReactions
 * @property array<UserResponse> $mentionedUsers
 * @property array<ReactionResponse> $ownReactions
 * @property array $restrictedVisibility
 * @property object $custom
 * @property array $reactionCounts
 * @property array $reactionScores
 * @property UserResponse $user
 * @property string|null $command
 * @property \DateTime|null $deletedAt
 * @property bool|null $deletedForMe
 * @property \DateTime|null $messageTextUpdatedAt
 * @property string|null $mml
 * @property string|null $parentID
 * @property \DateTime|null $pinExpires
 * @property \DateTime|null $pinnedAt
 * @property string|null $pollID
 * @property string|null $quotedMessageID
 * @property bool|null $showInChannel
 * @property array<UserResponse>|null $threadParticipants
 * @property ChannelResponse|null $channel
 * @property DraftResponse|null $draft
 * @property array|null $i18n
 * @property array|null $imageLabels
 * @property ChannelMemberResponse|null $member
 * @property ModerationV2Response|null $moderation
 * @property UserResponse|null $pinnedBy
 * @property PollResponseData|null $poll
 * @property MessageResponse|null $quotedMessage
 * @property array|null $reactionGroups
 * @property ReminderResponseData|null $reminder
 * @property SharedLocationResponseData|null $sharedLocation
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
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null,
        /** @var array<ReactionResponse>|null */
        #[ArrayOf(ReactionResponse::class)]
        public ?array $latestReactions = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null,
        /** @var array<ReactionResponse>|null */
        #[ArrayOf(ReactionResponse::class)]
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
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
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
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
