<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class VideoCallRuleConfig extends BaseModel
{
    public function __construct(
        public ?bool $flagAllLabels = null,
        public ?array $flaggedLabels = null,
        public ?array $rules = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
