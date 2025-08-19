<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Represents any chat message
 */
class MessageResponse extends BaseModel
{
    public function __construct(
        public ?string $cid = null,    // Channel unique identifier in <type>:<id> format 
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?int $deletedReplyCount = null,
        public ?string $html = null,    // Contains HTML markup of the message. Can only be set when using server-side API 
        public ?string $id = null,    // Message ID is unique string identifier of the message 
        public ?bool $pinned = null,    // Whether message is pinned or not 
        public ?int $replyCount = null,    // Number of replies to this message 
        public ?bool $shadowed = null,    // Whether the message was shadowed or not 
        public ?bool $silent = null,    // Whether message is silent or not 
        public ?string $text = null,    // Text of the message. Should be empty if `mml` is provided 
        public ?string $type = null,    // Contains type of the message 
        public ?\DateTime $updatedAt = null,    // Date/time of the last update 
        public ?array $attachments = null,    // Array of message attachments 
        public ?array $latestReactions = null,    // List of 10 latest reactions to this message 
        public ?array $mentionedUsers = null,    // List of mentioned users 
        public ?array $ownReactions = null,    // List of 10 latest reactions of authenticated user to this message 
        public ?array $restrictedVisibility = null,    // A list of user ids that have restricted visibility to the message, if the list is not empty, the message is only visible to the users in the list 
        public ?object $custom = null,
        public ?array $reactionCounts = null,    // An object containing number of reactions of each type. Key: reaction type (string), value: number of reactions (int) 
        public ?array $reactionScores = null,    // An object containing scores of reactions of each type. Key: reaction type (string), value: total score of reactions (int) 
        public ?UserResponse $user = null,
        public ?string $command = null,    // Contains provided slash command 
        public ?\DateTime $deletedAt = null,    // Date/time of deletion 
        public ?bool $deletedForMe = null,
        public ?\DateTime $messageTextUpdatedAt = null,
        public ?string $mml = null,    // Should be empty if `text` is provided. Can only be set when using server-side API 
        public ?string $parentID = null,    // ID of parent message (thread) 
        public ?\DateTime $pinExpires = null,    // Date when pinned message expires 
        public ?\DateTime $pinnedAt = null,    // Date when message got pinned 
        public ?string $pollID = null,    // Identifier of the poll to include in the message 
        public ?string $quotedMessageID = null,
        public ?bool $showInChannel = null,    // Whether thread reply should be shown in the channel as well 
        public ?array $threadParticipants = null,    // List of users who participate in thread 
        public ?DraftResponse $draft = null,
        public ?array $i18n = null,    // Object with translations. Key `language` contains the original language key. Other keys contain translations 
        public ?array $imageLabels = null,    // Contains image moderation information 
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
