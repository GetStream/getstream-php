<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpsertActionConfigItem extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $entityType = null,
        public ?int $order = null,
        public ?string $action = null,
        public ?string $icon = null,
        public ?string $description = null,
        public ?object $custom = null,
        public ?string $queueType = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
