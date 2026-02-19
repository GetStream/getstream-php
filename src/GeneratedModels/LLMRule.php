<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class LLMRule extends BaseModel
{
    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public ?string $action = null,
        /** @var array<BodyguardSeverityRule>|null */
        #[ArrayOf(BodyguardSeverityRule::class)]
        public ?array $severityRules = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
