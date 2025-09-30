<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
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
        public ?array $conditions = null,
        public ?array $groups = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
