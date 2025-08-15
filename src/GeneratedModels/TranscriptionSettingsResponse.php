<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class TranscriptionSettingsResponse extends BaseModel
{
    public function __construct(
        public ?string $closedCaptionMode = null,
        public ?string $language = null,
        public ?string $mode = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
