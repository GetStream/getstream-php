<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ContentCountryCodeParameters extends BaseModel
{
    public function __construct(
        public ?string $operator = null,
        public ?array $countryCodes = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
