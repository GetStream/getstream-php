<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class LLMRule extends BaseModel
{
    public function __construct(
        public ?string $description = null,
        public ?string $label = null,
        public ?string $action = null,
        public ?array $severityRules = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
