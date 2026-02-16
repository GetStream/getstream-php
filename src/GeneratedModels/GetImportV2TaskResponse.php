<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class GetImportV2TaskResponse extends BaseModel
{
    public function __construct(
        public ?int $appPk = null,
        public ?\DateTime $createdAt = null,
        public ?string $duration = null, // Duration of the request in milliseconds
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
