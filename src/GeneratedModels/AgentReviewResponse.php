<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AgentReviewResponse extends BaseModel
{
    public function __construct(
        /** @var array<AgentReviewJudgmentResponse>|null */
        #[ArrayOf(AgentReviewJudgmentResponse::class)]
        public ?array $judgments = null, // Per-label judgments, with the evidence the agent quoted
        public ?string $summary = null, // Short summary of the review
        public ?string $flagAssessment = null, // Whether the flag is supported, a likely false positive, or uncertain
        public ?string $recommendedAction = null, // Action the agent recommends for the item
        public ?float $confidence = null, // The agent's confidence in its recommended action, from 0 to 1
        public ?bool $contextIncomplete = null, // True when the agent did not have the full context it needed
        public ?string $modelRoute = null, // Model route that produced this review
        public ?string $agentSessionID = null, // Session id of the agent run that produced this review
        public ?object $usage = null, // Token usage reported for this review
        public ?\DateTime $createdAt = null, // When this review was recorded
        public ?string $status = null, // Lifecycle status of the review
        public ?string $skipReason = null, // Why the review was skipped or failed. Set when status is skipped or failed
        public ?string $reason = null, // Why Nora chose the recommended action
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
