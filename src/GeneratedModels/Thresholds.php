<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Sets thresholds for AI moderation
 */
class Thresholds extends BaseModel
{
    public function __construct(
        public ?LabelThresholds $explicit = null,
        public ?LabelThresholds $spam = null,
        public ?LabelThresholds $toxic = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
