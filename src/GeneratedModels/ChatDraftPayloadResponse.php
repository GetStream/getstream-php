<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChatDraftPayloadResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $text = null,
        public ?string $mml = null,
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null,
        public ?string $parentID = null,
        public ?bool $showInChannel = null,
        public ?object $custom = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null,
        public ?string $quotedMessageID = null,
        public ?string $html = null,
        public ?string $type = null,
        public ?bool $silent = null,
        public ?string $pollID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
