<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CheckResponse extends BaseModel
{
    public function __construct(
        public ?string $status = null, // Status of the moderation check (completed or pending)
        public ?string $taskID = null, // ID of the running moderation task
        public ?string $recommendedAction = null, // Suggested action based on moderation results
        public ?ReviewQueueItemResponse $item = null,
        /** @deprecated */
        public ?TriggeredRuleResponse $triggeredRule = null,
        /** @var array<TriggeredRuleResponse>|null */
        #[ArrayOf(TriggeredRuleResponse::class)]
        public ?array $triggeredRules = null, // All moderation rules triggered by this check (content, user, and call rules), with their resolved actions
        /** @var array<IntentScoreResponse>|null */
        #[ArrayOf(IntentScoreResponse::class)]
        public ?array $intentScores = null, // Score (0-100) of each policy intent topic against this request's text, in policy order (test mode only; omitted when the policy has no topics or scoring failed)
        public ?string $duration = null,
        public ?string $llmModel = null, // ID of the LLM model that produced the verdict (e.g. gpt-4o-mini). Omitted when no LLM ran synchronously (e.g. Bodyguard-only checks or async moderation)
        public ?string $llmReasoningEffort = null, // reasoning_effort sent with the LLM request that produced the verdict. Omitted when the request did not send one
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
