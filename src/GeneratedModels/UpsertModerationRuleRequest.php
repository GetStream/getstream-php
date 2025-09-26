<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpsertModerationRuleRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?string $ruleType = null,
        public ?RuleBuilderAction $action = null,
        public ?string $cooldownPeriod = null,
        public ?string $description = null,
        public ?bool $enabled = null,
        public ?string $logic = null,
        public ?string $team = null,
        public ?array $conditions = null,
        public ?array $configKeys = null,
        public ?array $groups = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
