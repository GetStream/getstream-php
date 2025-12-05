<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property string $description
 * @property bool $enabled
 * @property string $id
 * @property string $name
 * @property string $ruleType
 * @property string $team
 * @property \DateTime $updatedAt
 * @property array $configKeys
 * @property RuleBuilderAction $action
 * @property string|null $cooldownPeriod
 * @property string|null $logic
 * @property array<RuleBuilderCondition>|null $conditions
 * @property array<RuleBuilderConditionGroup>|null $groups
 */
class ModerationRuleV2Response extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $description = null,
        public ?bool $enabled = null,
        public ?string $id = null,
        public ?string $name = null,
        public ?string $ruleType = null,
        public ?string $team = null,
        public ?\DateTime $updatedAt = null,
        public ?array $configKeys = null,
        public ?RuleBuilderAction $action = null,
        public ?string $cooldownPeriod = null,
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
