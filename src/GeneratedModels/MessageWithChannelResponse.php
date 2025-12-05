<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Represents any chat message
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
 * @property ChannelResponse $channel
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
class MessageWithChannelResponse extends BaseModel
{
    public function __construct(
        public ?string $cid = null, // Channel unique identifier in <type>:<id> format
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?int $deletedReplyCount = null,
        public ?string $html = null, // Contains HTML markup of the message. Can only be set when using server-side API
        public ?string $id = null, // Message ID is unique string identifier of the message
        public ?bool $pinned = null, // Whether message is pinned or not
        public ?int $replyCount = null, // Number of replies to this message
        public ?bool $shadowed = null, // Whether the message was shadowed or not
        public ?bool $silent = null, // Whether message is silent or not
        public ?string $text = null, // Text of the message. Should be empty if `mml` is provided
        public ?string $type = null, // Contains type of the message
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        /** @var array<Attachment>|null Array of message attachments */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // Array of message attachments
        /** @var array<ReactionResponse>|null List of 10 latest reactions to this message */
        #[ArrayOf(ReactionResponse::class)]
        public ?array $latestReactions = null, // List of 10 latest reactions to this message
        /** @var array<UserResponse>|null List of mentioned users */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null, // List of mentioned users
        /** @var array<ReactionResponse>|null List of 10 latest reactions of authenticated user to this message */
        #[ArrayOf(ReactionResponse::class)]
        public ?array $ownReactions = null, // List of 10 latest reactions of authenticated user to this message
        public ?array $restrictedVisibility = null, // A list of user ids that have restricted visibility to the message, if the list is not empty, the message is only visible to the users in the list
        public ?ChannelResponse $channel = null,
        public ?object $custom = null,
        public ?array $reactionCounts = null, // An object containing number of reactions of each type. Key: reaction type (string), value: number of reactions (int)
        public ?array $reactionScores = null, // An object containing scores of reactions of each type. Key: reaction type (string), value: total score of reactions (int)
        public ?UserResponse $user = null,
        public ?string $command = null, // Contains provided slash command
        public ?\DateTime $deletedAt = null, // Date/time of deletion
        public ?bool $deletedForMe = null,
        public ?\DateTime $messageTextUpdatedAt = null,
        public ?string $mml = null, // Should be empty if `text` is provided. Can only be set when using server-side API
        public ?string $parentID = null, // ID of parent message (thread)
        public ?\DateTime $pinExpires = null, // Date when pinned message expires
        public ?\DateTime $pinnedAt = null, // Date when message got pinned
        public ?string $pollID = null, // Identifier of the poll to include in the message
        public ?string $quotedMessageID = null,
        public ?bool $showInChannel = null, // Whether thread reply should be shown in the channel as well
        /** @var array<UserResponse>|null List of users who participate in thread */
        #[ArrayOf(UserResponse::class)]
        public ?array $threadParticipants = null, // List of users who participate in thread
        public ?DraftResponse $draft = null,
        public ?array $i18n = null, // Object with translations. Key `language` contains the original language key. Other keys contain translations
        public ?array $imageLabels = null, // Contains image moderation information
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
