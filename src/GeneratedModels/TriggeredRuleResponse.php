<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class TriggeredRuleResponse extends BaseModel
{
    public function __construct(
        public ?array $actions = null, // Action types resolved from the rule's action sequence
        public ?CallActionOptions $callOptions = null,
        public ?string $ruleID = null, // ID of the moderation rule that triggered
        public ?string $ruleName = null, // Name of the moderation rule that triggered
        public ?int $violationNumber = null, // Violation count for action sequence rules (1-based)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
