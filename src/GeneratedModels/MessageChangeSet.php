<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $attachments
 * @property bool $custom
 * @property bool $html
 * @property bool $mentionedUserIds
 * @property bool $mml
 * @property bool $pin
 * @property bool $quotedMessageID
 * @property bool $silent
 * @property bool $text
 */
class MessageChangeSet extends BaseModel
{
    public function __construct(
        public ?bool $attachments = null,
        public ?bool $custom = null,
        public ?bool $html = null,
        public ?bool $mentionedUserIds = null,
        public ?bool $mml = null,
        public ?bool $pin = null,
        public ?bool $quotedMessageID = null,
        public ?bool $silent = null,
        public ?bool $text = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
