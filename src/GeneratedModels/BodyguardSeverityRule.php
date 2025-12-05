<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $action
 * @property string $severity
 */
class BodyguardSeverityRule extends BaseModel
{
    public function __construct(
        public ?string $action = null,
        public ?string $severity = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
