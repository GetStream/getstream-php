<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $appPk
 * @property \DateTime $createdAt
 * @property string $id
 * @property string $product
 * @property int $state
 * @property \DateTime $updatedAt
 * @property ImportV2TaskSettings $settings
 */
class ImportV2TaskItem extends BaseModel
{
    public function __construct(
        public ?int $appPk = null,
        public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?string $product = null,
        public ?int $state = null,
        public ?\DateTime $updatedAt = null,
        public ?ImportV2TaskSettings $settings = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
