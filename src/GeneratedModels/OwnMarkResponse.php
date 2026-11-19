<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * A mark the viewer put on this message.
 */
class OwnMarkResponse extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The mark type, for example played
        public ?\DateTime $createdAt = null, // When the mark was written
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
