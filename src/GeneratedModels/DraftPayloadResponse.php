<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Contains the draft message content
 */
class DraftPayloadResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Message ID is unique string identifier of the message
        public ?string $text = null, // Text of the message
        public ?string $mml = null, // MML content of the message
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // Array of message attachments
        public ?string $parentID = null, // ID of parent message (thread)
        public ?bool $showInChannel = null, // Whether thread reply should be shown in the channel as well
        public ?object $custom = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null, // List of mentioned users
        public ?string $quotedMessageID = null,
        public ?string $html = null, // Contains HTML markup of the message
        public ?string $type = null, // Contains type of the message. One of: regular, system
        public ?bool $silent = null, // Whether message is silent or not
        public ?string $pollID = null, // Identifier of the poll to include in the message
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
