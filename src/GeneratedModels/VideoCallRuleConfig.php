<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $flagAllLabels
 * @property array|null $flaggedLabels
 * @property array<HarmConfig>|null $rules
 */
class VideoCallRuleConfig extends BaseModel
{
    public function __construct(
        public ?bool $flagAllLabels = null,
        public ?array $flaggedLabels = null,
        /** @var array<HarmConfig>|null */
        #[ArrayOf(HarmConfig::class)]
        public ?array $rules = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
