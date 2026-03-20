<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class RetentionPolicy extends BaseModel
{
    public function __construct(
        public ?int $appPk = null,
        public ?string $policy = null,
        public ?PolicyConfig $config = null,
        public ?\DateTime $enabledAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
