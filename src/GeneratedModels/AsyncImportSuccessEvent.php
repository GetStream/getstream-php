<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AsyncImportSuccessEvent extends BaseModel
{
    public function __construct(
        public ?string $taskID = null,
        public ?string $product = null,
        public ?string $state = null,
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
