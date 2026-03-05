<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CreateImportRequest extends BaseModel
{
    public function __construct(
        public ?string $path = null,
        public ?string $mode = null,
        public ?bool $mergeCustom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
