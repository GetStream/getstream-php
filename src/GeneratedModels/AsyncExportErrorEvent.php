<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AsyncExportErrorEvent extends BaseModel
{
    public function __construct(
        public ?string $error = null,
        public ?string $taskID = null,
        public ?\DateTime $startedAt = null,
        public ?\DateTime $finishedAt = null,
        public ?string $type = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
