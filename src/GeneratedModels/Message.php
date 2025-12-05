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
 * @property array<Reaction> $latestReactions
 * @property array<User> $mentionedUsers
 * @property array<Reaction> $ownReactions
 * @property array $restrictedVisibility
 * @property object $custom
 * @property array $reactionCounts
 * @property array $reactionGroups
 * @property array $reactionScores
 * @property bool|null $beforeMessageSendFailed
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
 * @property array<User>|null $threadParticipants
 * @property array|null $i18n
 * @property array|null $imageLabels
 * @property ChannelMember|null $member
 * @property ModerationV2Response|null $moderation
 * @property User|null $pinnedBy
 * @property Poll|null $poll
 * @property Message|null $quotedMessage
 * @property MessageReminder|null $reminder
 * @property SharedLocation|null $sharedLocation
 * @property User|null $user
 */
class Message extends BaseModel
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
        /** @var array<Reaction>|null */
        #[ArrayOf(Reaction::class)]
        public ?array $latestReactions = null,
        /** @var array<User>|null */
        #[ArrayOf(User::class)]
        public ?array $mentionedUsers = null,
        /** @var array<Reaction>|null */
        #[ArrayOf(Reaction::class)]
        public ?array $ownReactions = null,
        public ?array $restrictedVisibility = null,
        public ?object $custom = null,
        public ?array $reactionCounts = null,
        public ?array $reactionGroups = null,
        public ?array $reactionScores = null,
        public ?bool $beforeMessageSendFailed = null,
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
        /** @var array<User>|null */
        #[ArrayOf(User::class)]
        public ?array $threadParticipants = null,
        public ?array $i18n = null,
        public ?array $imageLabels = null,
        public ?ChannelMember $member = null,
        public ?ModerationV2Response $moderation = null,
        public ?User $pinnedBy = null,
        public ?Poll $poll = null,
        public ?Message $quotedMessage = null,
        public ?MessageReminder $reminder = null,
        public ?SharedLocation $sharedLocation = null,
        public ?User $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
