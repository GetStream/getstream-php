<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RecordSettings extends BaseModel
{
    public function __construct(
        public ?string $mode = null,
        public ?bool $audioOnly = null,
        public ?string $quality = null,
        public ?LayoutSettings $layout = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
