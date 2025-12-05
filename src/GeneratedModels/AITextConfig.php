<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $async
 * @property bool|null $enabled
 * @property string|null $profile
 * @property array<BodyguardRule>|null $rules
 * @property array<BodyguardSeverityRule>|null $severityRules
 */
class AITextConfig extends BaseModel
{
    public function __construct(
        public ?bool $async = null,
        public ?bool $enabled = null,
        public ?string $profile = null,
        /** @var array<BodyguardRule>|null */
        #[ArrayOf(BodyguardRule::class)]
        public ?array $rules = null,
        /** @var array<BodyguardSeverityRule>|null */
        #[ArrayOf(BodyguardSeverityRule::class)]
        public ?array $severityRules = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
