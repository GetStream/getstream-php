<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ChannelMemberLookup extends BaseModel
{
    public function __construct(
        public ?bool $archived = null,
        public ?bool $banned = null,
        public ?bool $blocked = null,
        public ?bool $hidden = null,
        public ?bool $pinned = null,
        public ?\DateTime $archivedAt = null,
        public ?\DateTime $banExpires = null,
        public ?\DateTime $pinnedAt = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
