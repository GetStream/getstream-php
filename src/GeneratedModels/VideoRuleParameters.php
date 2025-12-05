<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $threshold
 * @property string|null $timeWindow
 * @property array|null $harmLabels
 */
class VideoRuleParameters extends BaseModel
{
    public function __construct(
        public ?int $threshold = null,
        public ?string $timeWindow = null,
        public ?array $harmLabels = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
