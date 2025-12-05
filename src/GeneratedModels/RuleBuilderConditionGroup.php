<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $logic
 * @property array<RuleBuilderCondition>|null $conditions
 */
class RuleBuilderConditionGroup extends BaseModel
{
    public function __construct(
        public ?string $logic = null,
        /** @var array<RuleBuilderCondition>|null */
        #[ArrayOf(RuleBuilderCondition::class)]
        public ?array $conditions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
