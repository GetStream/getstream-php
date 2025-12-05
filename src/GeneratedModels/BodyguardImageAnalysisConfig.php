<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<BodyguardRule>|null $rules
 */
class BodyguardImageAnalysisConfig extends BaseModel
{
    public function __construct(
        /** @var array<BodyguardRule>|null */
        #[ArrayOf(BodyguardRule::class)]
        public ?array $rules = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
