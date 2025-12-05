<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property bool $enablePush
 * @property string $eventType
 * @property \DateTime $updatedAt
 * @property string|null $template
 */
class PushTemplate extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?bool $enablePush = null,
        public ?string $eventType = null,
        public ?\DateTime $updatedAt = null,
        public ?string $template = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
