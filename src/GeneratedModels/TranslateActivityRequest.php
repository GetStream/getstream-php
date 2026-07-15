<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class TranslateActivityRequest extends BaseModel
{
    public function __construct(
        public ?string $language = null, // ISO 639-1 language code to translate to
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
