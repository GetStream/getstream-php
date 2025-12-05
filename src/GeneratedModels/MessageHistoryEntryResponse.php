<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $isDeleted
 * @property string $messageID
 * @property \DateTime $messageUpdatedAt
 * @property string $messageUpdatedByID
 * @property string $text
 * @property array<Attachment> $attachments
 * @property object $custom
 */
class MessageHistoryEntryResponse extends BaseModel
{
    public function __construct(
        public ?bool $isDeleted = null,
        public ?string $messageID = null,
        public ?\DateTime $messageUpdatedAt = null,
        public ?string $messageUpdatedByID = null,
        public ?string $text = null,
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
