<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property \DateTime $finishedAt
 * @property \DateTime $startedAt
 * @property string $taskID
 * @property string $url
 * @property object $custom
 * @property string $type
 * @property \DateTime|null $receivedAt
 */
class AsyncBulkImageModerationEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?\DateTime $finishedAt = null,
        public ?\DateTime $startedAt = null,
        public ?string $taskID = null,
        public ?string $url = null,
        public ?object $custom = null,
        public ?string $type = null,
        public ?\DateTime $receivedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
