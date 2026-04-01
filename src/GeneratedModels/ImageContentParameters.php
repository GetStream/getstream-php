<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ImageContentParameters extends BaseModel
{
    public function __construct(
        public ?array $harmLabels = null,
        public ?string $labelOperator = null,
        public ?float $minConfidence = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
