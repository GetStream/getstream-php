<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $ruleType
 * @property RuleBuilderAction $action
 * @property string|null $cooldownPeriod
 * @property string|null $id
 * @property string|null $logic
 * @property array<RuleBuilderCondition>|null $conditions
 * @property array<RuleBuilderConditionGroup>|null $groups
 */
class RuleBuilderRule extends BaseModel
{
    public function __construct(
        public ?string $ruleType = null,
        public ?RuleBuilderAction $action = null,
        public ?string $cooldownPeriod = null,
        public ?string $id = null,
        public ?string $logic = null,
        /** @var array<RuleBuilderCondition>|null */
        #[ArrayOf(RuleBuilderCondition::class)]
        public ?array $conditions = null,
        /** @var array<RuleBuilderConditionGroup>|null */
        #[ArrayOf(RuleBuilderConditionGroup::class)]
        public ?array $groups = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
