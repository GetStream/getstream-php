<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AITextConfig extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?string $profile = null,
        public ?array $rules = null,
        public ?array $severityRules = null,
        public ?bool $async = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
