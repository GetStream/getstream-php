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
        public ?TriggeredRuleResponse $triggeredRule = null,
        /** @var array<TriggeredRuleResponse>|null */
        #[ArrayOf(TriggeredRuleResponse::class)]
        public ?array $triggeredRules = null, // All moderation rules triggered by this check (content, user, and call rules), with their resolved actions
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
