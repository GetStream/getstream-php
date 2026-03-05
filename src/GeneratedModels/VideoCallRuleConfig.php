<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class VideoCallRuleConfig extends BaseModel
{
    public function __construct(
        /** @var array<HarmConfig>|null */
        #[ArrayOf(HarmConfig::class)]
        public ?array $rules = null,
        public ?bool $flagAllLabels = null,
        public ?array $flaggedLabels = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
