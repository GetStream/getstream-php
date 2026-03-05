<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class LayoutSettings extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?object $options = null,
        public ?string $externalAppUrl = null,
        public ?string $externalCssUrl = null,
        public ?bool $detectOrientation = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
