<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateBlockListRequest extends BaseModel
{
    public function __construct(
        public ?bool $isLeetCheckEnabled = null,
        public ?bool $isPluralCheckEnabled = null,
        public ?string $team = null,
        public ?array $words = null,    // List of words to block 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
