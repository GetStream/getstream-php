<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateCommandRequest extends BaseModel
{
    public function __construct(
        public ?string $description = null,    // Description, shown in commands auto-completion 
        public ?string $args = null,    // Arguments help text, shown in commands auto-completion 
        public ?string $set = null,    // Set name used for grouping commands 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
