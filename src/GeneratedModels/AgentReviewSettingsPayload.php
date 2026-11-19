<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Settings for the moderation agent reviewer, which reviews moderation outcomes and proposes or applies an action.
 */
class AgentReviewSettingsPayload extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null, // Turns the agent reviewer on. It only runs when agent_config_id is set too.
        public ?string $mode = null, // approve_first records the verdict for a moderator to approve; auto_act applies it when its confidence reaches auto_act_min_confidence; export_only changes nothing on the review queue and only exports each verdict for evaluation. Defaults to approve_first.
        public ?string $scope = null, // Which checks are reviewed: flagged ones only, or all_checks sampled by sample_rate. Defaults to flagged.
        public ?float $sampleRate = null, // Fraction (0-1) of checks reviewed with scope all_checks. Defaults to 1.
        public ?string $agentConfigID = null, // The app's Accelerate agent config with role agent_moderator.
        public ?int $contextDays = null, // Days of the user's moderation history given to the agent. Defaults to 7, at most 30.
        public ?int $contextMessages = null, // Surrounding items given to the agent on each side of the reviewed one: chat messages, Feeds comments, or the author's other Feeds activities. Defaults to 20, at most 100.
        public ?float $autoActMinConfidence = null, // Minimum verdict confidence (0-1) for auto_act to apply an action. Defaults to 0.9.
        public ?int $maxConcurrency = null, // Maximum reviews in flight for the app. Defaults to 10, at most 100.
        public ?bool $reviewImages = null, // Sends the images of the content under review to the agent, so it can judge them alongside the text. The agent config must run on a model that sees images. Defaults to false.
        public ?array $ruleIds = null, // Moderation rule IDs: only items flagged by one of these rules are reviewed, and items flagged only by other sources are left to moderators. Empty reviews every flagged item. Only used with scope flagged; at most 100.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
