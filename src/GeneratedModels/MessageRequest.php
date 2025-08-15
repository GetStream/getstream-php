<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
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
        public ?array $attachments = null,
        public ?array $mentionedUsers = null,
        public ?array $restrictedVisibility = null,
        public ?object $custom = null,
        public ?SharedLocation $sharedLocation = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
