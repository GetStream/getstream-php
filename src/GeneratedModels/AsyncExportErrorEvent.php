<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property string $error
 * @property \DateTime $finishedAt
 * @property \DateTime $startedAt
 * @property string $taskID
 * @property object $custom
 * @property string $type
 * @property \DateTime|null $receivedAt
 */
class AsyncExportErrorEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $error = null,
        public ?\DateTime $finishedAt = null,
        public ?\DateTime $startedAt = null,
        public ?string $taskID = null,
        public ?object $custom = null,
        public ?string $type = null,
        public ?\DateTime $receivedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
