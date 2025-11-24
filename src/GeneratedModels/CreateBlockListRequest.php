<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Block list contains restricted words
 */
class CreateBlockListRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null,    // Block list name 
        public ?array $words = null,    // List of words to block 
        public ?bool $isLeetCheckEnabled = null,
        public ?bool $isPluralCheckEnabled = null,
        public ?string $team = null,
        public ?string $type = null,    // Block list type. 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
