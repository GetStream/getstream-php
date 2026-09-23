<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UserIdenticalImageCountParameters extends BaseModel
{
    public function __construct(
        public ?int $threshold = null,
        public ?string $timeWindow = null,
        public ?string $match = null,
        public ?int $similarityDistance = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
