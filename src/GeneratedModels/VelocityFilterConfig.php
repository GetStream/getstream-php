<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class VelocityFilterConfig extends BaseModel
{
    public function __construct(
        public ?bool $async = null,
        public ?bool $enabled = null,
        /** @var array<VelocityFilterConfigRule>|null */
        #[ArrayOf(VelocityFilterConfigRule::class)]
        public ?array $rules = null,
        public ?bool $cascadingActions = null,
        public ?bool $firstMessageOnly = null,
        public ?int $cidsPerUser = null,
        public ?bool $advancedFilters = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
