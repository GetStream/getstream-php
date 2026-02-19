<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ImportV2TaskItem extends BaseModel
{
    public function __construct(
        public ?ImportV2TaskSettings $settings = null,
        public ?string $id = null,
        public ?int $appPk = null,
        public ?string $product = null,
        public ?int $state = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
