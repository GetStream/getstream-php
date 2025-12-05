<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $advancedFilters
 * @property bool|null $async
 * @property bool|null $cascadingActions
 * @property int|null $cidsPerUser
 * @property bool|null $enabled
 * @property bool|null $firstMessageOnly
 * @property array<VelocityFilterConfigRule>|null $rules
 */
class VelocityFilterConfig extends BaseModel
{
    public function __construct(
        public ?bool $advancedFilters = null,
        public ?bool $async = null,
        public ?bool $cascadingActions = null,
        public ?int $cidsPerUser = null,
        public ?bool $enabled = null,
        public ?bool $firstMessageOnly = null,
        /** @var array<VelocityFilterConfigRule>|null */
        #[ArrayOf(VelocityFilterConfigRule::class)]
        public ?array $rules = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
