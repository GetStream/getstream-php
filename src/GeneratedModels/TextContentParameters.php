<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class TextContentParameters extends BaseModel
{
    public function __construct(
        public ?bool $containsUrl = null,
        public ?string $severity = null,
        public ?array $blocklistMatch = null,
        public ?array $harmLabels = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
