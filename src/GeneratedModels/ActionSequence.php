<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $action
 * @property bool|null $blur
 * @property int|null $cooldownPeriod
 * @property int|null $threshold
 * @property int|null $timeWindow
 * @property bool|null $warning
 * @property string|null $warningText
 */
class ActionSequence extends BaseModel
{
    public function __construct(
        public ?string $action = null,
        public ?bool $blur = null,
        public ?int $cooldownPeriod = null,
        public ?int $threshold = null,
        public ?int $timeWindow = null,
        public ?bool $warning = null,
        public ?string $warningText = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
