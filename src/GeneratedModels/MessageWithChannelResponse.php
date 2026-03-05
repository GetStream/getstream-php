<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Represents any chat message
 */
class MessageWithChannelResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Message ID is unique string identifier of the message
        public ?string $text = null, // Text of the message. Should be empty if `mml` is provided
        public ?string $mml = null, // Should be empty if `text` is provided. Can only be set when using server-side API
        public ?string $command = null, // Contains provided slash command
        public ?string $html = null, // Contains HTML markup of the message. Can only be set when using server-side API
        public ?string $type = null, // Contains type of the message. One of: regular, ephemeral, error, reply, system, deleted
        public ?UserResponse $user = null,
        public ?ChannelMemberResponse $member = null,
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // Array of message attachments
        /** @var array<ReactionResponse>|null */
        #[ArrayOf(ReactionResponse::class)]
        public ?array $latestReactions = null, // List of 10 latest reactions to this message
        /** @var array<ReactionResponse>|null */
        #[ArrayOf(ReactionResponse::class)]
        public ?array $ownReactions = null, // List of 10 latest reactions of authenticated user to this message
        public ?array $reactionCounts = null, // An object containing number of reactions of each type. Key: reaction type (string), value: number of reactions (int)
        public ?array $reactionScores = null, // An object containing scores of reactions of each type. Key: reaction type (string), value: total score of reactions (int)
        /** @var array<string, ReactionGroupResponse>|null */
        #[MapOf(ReactionGroupResponse::class)]
        public ?array $reactionGroups = null,
        public ?string $parentID = null, // ID of parent message (thread)
        public ?bool $showInChannel = null, // Whether thread reply should be shown in the channel as well
        public ?int $replyCount = null, // Number of replies to this message
        public ?int $deletedReplyCount = null,
        public ?string $quotedMessageID = null,
        public ?MessageResponse $quotedMessage = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $threadParticipants = null, // List of users who participate in thread
        public ?string $cid = null, // Channel unique identifier in <type>:<id> format
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        public ?\DateTime $deletedAt = null, // Date/time of deletion
        public ?object $custom = null,
        public ?bool $shadowed = null, // Whether the message was shadowed or not
        public ?array $imageLabels = null, // Contains image moderation information
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null, // List of mentioned users
        public ?array $mentionedRoles = null, // List of roles mentioned in the message (e.g. admin, channel_moderator, custom roles). Members with matching roles will receive push notifications based on their push preferences. Max 10 roles
        public ?array $mentionedGroupIds = null, // List of user group IDs mentioned in the message. Group members who are also channel members will receive push notifications based on their push preferences. Max 10 groups
        public ?bool $mentionedChannel = null, // Whether the message mentioned the channel tag
        public ?bool $mentionedHere = null, // Whether the message mentioned online users with @here tag
        public ?array $i18n = null, // Object with translations. Key `language` contains the original language key. Other keys contain translations
        public ?bool $silent = null, // Whether message is silent or not
        public ?bool $pinned = null, // Whether message is pinned or not
        public ?\DateTime $pinnedAt = null, // Date when message got pinned
        public ?UserResponse $pinnedBy = null,
        public ?\DateTime $pinExpires = null, // Date when pinned message expires
        public ?\DateTime $messageTextUpdatedAt = null,
        public ?string $pollID = null, // Identifier of the poll to include in the message
        public ?PollResponseData $poll = null,
        public ?ModerationV2Response $moderation = null,
        public ?array $restrictedVisibility = null, // A list of user ids that have restricted visibility to the message, if the list is not empty, the message is only visible to the users in the list
        public ?DraftResponse $draft = null,
        public ?ReminderResponseData $reminder = null,
        public ?SharedLocationResponseData $sharedLocation = null,
        public ?bool $deletedForMe = null,
        public ?ChannelResponse $channel = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
