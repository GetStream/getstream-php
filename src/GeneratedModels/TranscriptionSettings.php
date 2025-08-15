<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class TranscriptionSettings extends BaseModel
{
    public function __construct(
        public ?string $closedCaptionMode = null,
        public ?string $language = null,    // The language used in this call as a two letter code 
        public ?string $mode = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
