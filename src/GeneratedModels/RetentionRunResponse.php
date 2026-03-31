<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class RetentionRunResponse extends BaseModel
{
    public function __construct(
        public ?int $appPk = null,
        public ?string $policy = null,
        public ?string $date = null,
        public ?RunStats $stats = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
