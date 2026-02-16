<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Message data for creating or updating a message
 */
class MessageRequest extends BaseModel
{
    public function __construct(
        public ?string $html = null, // Contains HTML markup of the message. Can only be set when using server-side API
        public ?string $id = null, // Message ID is unique string identifier of the message
        public ?bool $mentionedChannel = null,
        public ?string $mml = null, // Should be empty if `text` is provided. Can only be set when using server-side API
        public ?string $parentID = null, // ID of parent message (thread)
        public ?\DateTime $pinExpires = null, // Date when pinned message expires
        public ?bool $pinned = null, // Whether message is pinned or not
        public ?\DateTime $pinnedAt = null, // Date when message got pinned
        public ?string $pollID = null, // Identifier of the poll to include in the message
        public ?string $quotedMessageID = null,
        public ?bool $showInChannel = null, // Whether thread reply should be shown in the channel as well
        public ?bool $silent = null, // Whether message is silent or not
        public ?string $text = null, // Text of the message. Should be empty if `mml` is provided
        public ?string $type = null, // Contains type of the message. One of: regular, system
        public ?string $userID = null,
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // Array of message attachments
        public ?array $mentionedUsers = null, // Array of user IDs to mention
        public ?array $restrictedVisibility = null, // A list of user ids that have restricted visibility to the message
        public ?object $custom = null,
        public ?SharedLocation $sharedLocation = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
