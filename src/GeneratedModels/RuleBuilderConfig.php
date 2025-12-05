<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $async
 * @property array<RuleBuilderRule>|null $rules
 */
class RuleBuilderConfig extends BaseModel
{
    public function __construct(
        public ?bool $async = null,
        /** @var array<RuleBuilderRule>|null */
        #[ArrayOf(RuleBuilderRule::class)]
        public ?array $rules = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
