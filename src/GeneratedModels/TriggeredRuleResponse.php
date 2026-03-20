<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class TriggeredRuleResponse extends BaseModel
{
    public function __construct(
        public ?array $actions = null, // Array of action types resolved from the rule's action sequence (e.g. mute_video, kick_user, end_call, warning, blur)
        public ?CallActionOptions $callOptions = null,
        public ?string $ruleID = null, // ID of the moderation rule that triggered
        public ?string $ruleName = null, // Name of the moderation rule that triggered
        public ?int $violationNumber = null, // The violation count for action sequence rules (1-based)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
