<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $id
 * @property string $text
 * @property object $custom
 * @property string|null $html
 * @property string|null $mml
 * @property string|null $parentID
 * @property string|null $pollID
 * @property string|null $quotedMessageID
 * @property bool|null $showInChannel
 * @property bool|null $silent
 * @property string|null $type
 * @property array<Attachment>|null $attachments
 * @property array<UserResponse>|null $mentionedUsers
 */
class DraftPayloadResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $text = null,
        public ?object $custom = null,
        public ?string $html = null,
        public ?string $mml = null,
        public ?string $parentID = null,
        public ?string $pollID = null,
        public ?string $quotedMessageID = null,
        public ?bool $showInChannel = null,
        public ?bool $silent = null,
        public ?string $type = null,
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $mentionedUsers = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
