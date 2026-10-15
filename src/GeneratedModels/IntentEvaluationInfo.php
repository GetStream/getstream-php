<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IntentEvaluationInfo extends BaseModel
{
    public function __construct(
        public ?array $rawScores = null, // Score (0-100) the model gave every topic in the analysis call, keyed by topic label, before message-count damping.
        public ?array $scores = null, // Final score (0-100) of every topic after message-count damping, keyed by topic label. Conditions compare against these.
        /** @var array<IntentConditionInfo>|null */
        #[ArrayOf(IntentConditionInfo::class)]
        public ?array $conditions = null, // One entry per `intent_rule` condition of the rule, flat conditions first, then group conditions.
        public ?string $conversationID = null, // The analyzed conversation: the channel CID for chat, the object ID for feeds.
        public ?int $messageCount = null, // Number of conversation messages sent to the model.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
