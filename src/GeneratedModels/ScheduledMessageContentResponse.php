<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The message a scheduled message will send
 */
class ScheduledMessageContentResponse extends BaseModel
{
    public function __construct(
        public ?string $text = null, // Text of the message
        public ?string $mml = null, // MML content of the message
        public ?string $html = null, // Contains HTML markup of the message
        public ?string $type = null, // Contains type of the message. One of: regular, system
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // Array of message attachments
        public ?string $parentID = null, // ID of parent message (thread)
        public ?bool $showInChannel = null, // Whether thread reply should be shown in the channel as well
        public ?string $quotedMessageID = null,
        public ?array $mentionedUsers = null, // IDs of the users mentioned in the message
        public ?array $mentionedRoles = null, // Roles mentioned in the message
        public ?array $mentionedGroupIds = null, // IDs of the user groups mentioned in the message
        public ?bool $mentionedChannel = null, // Whether the message mentions the whole channel
        public ?bool $mentionedHere = null, // Whether the message mentions the online channel members
        public ?array $restrictedVisibility = null, // IDs of the users the message will be visible to
        public ?bool $silent = null, // Whether message is silent or not
        public ?bool $pinned = null, // Whether the message will be pinned when sent
        public ?\DateTime $pinExpires = null, // Date/time the pin expires
        public ?string $pollID = null, // Identifier of the poll to include in the message
        public ?ScheduledMessageLocation $sharedLocation = null, // The location a scheduled message will share
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
