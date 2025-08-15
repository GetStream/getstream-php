<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
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
        public ?array $attachments = null,
        public ?array $mentionedUsers = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
