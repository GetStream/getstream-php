<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class RuleBuilderRule extends BaseModel
{
    public function __construct(
        public ?string $ruleType = null,
        public ?string $cooldownPeriod = null,
        public ?string $id = null,
        public ?string $logic = null,
        /** @var array<CallRuleActionSequence>|null */
        #[ArrayOf(CallRuleActionSequence::class)]
        public ?array $actionSequences = null,
        /** @var array<RuleBuilderCondition>|null */
        #[ArrayOf(RuleBuilderCondition::class)]
        public ?array $conditions = null,
        /** @var array<RuleBuilderConditionGroup>|null */
        #[ArrayOf(RuleBuilderConditionGroup::class)]
        public ?array $groups = null,
        public ?RuleBuilderAction $action = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
