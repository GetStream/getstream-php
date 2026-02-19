<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SessionWarningResponse extends BaseModel
{
    public function __construct(
        public ?string $code = null,
        public ?string $warning = null,
        public ?\DateTime $time = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
