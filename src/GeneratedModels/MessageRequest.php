<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $html
 * @property string|null $id
 * @property string|null $mml
 * @property string|null $parentID
 * @property \DateTime|null $pinExpires
 * @property bool|null $pinned
 * @property \DateTime|null $pinnedAt
 * @property string|null $pollID
 * @property string|null $quotedMessageID
 * @property bool|null $showInChannel
 * @property bool|null $silent
 * @property string|null $text
 * @property string|null $type
 * @property string|null $userID
 * @property array<Attachment>|null $attachments
 * @property array|null $mentionedUsers
 * @property array|null $restrictedVisibility
 * @property object|null $custom
 * @property SharedLocation|null $sharedLocation
 * @property UserRequest|null $user
 */
class MessageRequest extends BaseModel
{
    public function __construct(
        public ?string $html = null,
        public ?string $id = null,
        public ?string $mml = null,
        public ?string $parentID = null,
        public ?\DateTime $pinExpires = null,
        public ?bool $pinned = null,
        public ?\DateTime $pinnedAt = null,
        public ?string $pollID = null,
        public ?string $quotedMessageID = null,
        public ?bool $showInChannel = null,
        public ?bool $silent = null,
        public ?string $text = null,
        public ?string $type = null,
        public ?string $userID = null,
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null,
        public ?array $mentionedUsers = null,
        public ?array $restrictedVisibility = null,
        public ?object $custom = null,
        public ?SharedLocation $sharedLocation = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
