<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpsertModerationRuleRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?string $description = null,
        public ?array $configKeys = null,
        public ?string $team = null,
        public ?string $ruleType = null,
        /** @var array<RuleBuilderCondition>|null */
        #[ArrayOf(RuleBuilderCondition::class)]
        public ?array $conditions = null,
        public ?string $logic = null,
        /** @var array<RuleBuilderConditionGroup>|null */
        #[ArrayOf(RuleBuilderConditionGroup::class)]
        public ?array $groups = null,
        public ?RuleBuilderAction $action = null,
        /** @var array<CallRuleActionSequence>|null */
        #[ArrayOf(CallRuleActionSequence::class)]
        public ?array $actionSequences = null,
        public ?string $cooldownPeriod = null,
        public ?bool $enabled = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
