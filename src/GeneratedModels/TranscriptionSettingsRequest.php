<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class TranscriptionSettingsRequest extends BaseModel
{
    public function __construct(
        public ?string $mode = null,
        public ?string $closedCaptionMode = null,
        public ?string $language = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
