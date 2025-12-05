<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<ModerationRuleV2Response> $rules
 * @property array $defaultLlmLabels
 * @property string|null $next
 * @property string|null $prev
 */
class QueryModerationRulesResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<ModerationRuleV2Response>|null List of moderation rules */
        #[ArrayOf(ModerationRuleV2Response::class)]
        public ?array $rules = null, // List of moderation rules
        public ?array $defaultLlmLabels = null, // Default LLM label descriptions
        public ?string $next = null,
        public ?string $prev = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
