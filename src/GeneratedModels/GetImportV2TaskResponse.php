<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class GetImportV2TaskResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?int $appPk = null,
        public ?string $product = null,
        public ?int $state = null,
        public ?ImportV2TaskSettings $settings = null,
        public ?object $result = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
