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
        public ?object $custom = null,
        public ?string $html = null, // Contains HTML markup of the message
        public ?string $mml = null, // MML content of the message
        public ?string $parentID = null, // ID of parent message (thread)
        public ?string $pollID = null, // Identifier of the poll to include in the message
        public ?string $quotedMessageID = null,
        public ?bool $showInChannel = null, // Whether thread reply should be shown in the channel as well
        public ?bool $silent = null, // Whether message is silent or not
        public ?string $type = null, // Contains type of the message. One of: regular, system
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // Array of message attachments
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null, // List of mentioned users
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
