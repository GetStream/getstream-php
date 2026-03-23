<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AIImageLabelDefinition extends BaseModel
{
    public function __construct(
        public ?string $key = null,
        public ?string $label = null,
        public ?string $description = null,
        public ?string $group = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
