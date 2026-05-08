<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpsertModerationRuleRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null, // Unique rule name
        public ?string $userID = null, // Optional user ID to associate with the audit log entry
        public ?UserRequest $user = null,
        public ?string $description = null, // Optional description of the rule
        public ?array $configKeys = null, // List of config keys this rule applies to
        public ?string $team = null, // Team scope for the rule
        public ?string $ruleType = null, // Type of rule: user, content, or call
        /** @var array<RuleBuilderCondition>|null */
        #[ArrayOf(RuleBuilderCondition::class)]
        public ?array $conditions = null, // Flat list of conditions (legacy)
        public ?string $logic = null, // Logical operator between conditions/groups: AND or OR
        /** @var array<RuleBuilderConditionGroup>|null */
        #[ArrayOf(RuleBuilderConditionGroup::class)]
        public ?array $groups = null, // Nested condition groups
        public ?RuleBuilderAction $action = null,
        /** @var array<CallRuleActionSequence>|null */
        #[ArrayOf(CallRuleActionSequence::class)]
        public ?array $actionSequences = null, // Escalation sequences for call rules
        public ?string $cooldownPeriod = null, // Duration before rule can trigger again (e.g. 24h, 7d)
        public ?bool $enabled = null, // Whether the rule is active
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
