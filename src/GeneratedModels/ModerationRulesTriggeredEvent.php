<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent automatically whenever a rule builder rule is triggered
 */
class ModerationRulesTriggeredEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?ModerationRuleInfo $rule = null,
        public ?int $violationNumber = null, // The violation number for call rules (optional)
        public ?string $entityID = null, // The ID of the entity that triggered the rule
        public ?string $entityType = null, // The type of the entity (call, user, message, etc.)
        public ?string $userID = null, // The ID of the user who triggered the rule
        public ?array $triggeredActions = null, // Array of action types that were triggered
        public ?string $reviewQueueItemID = null, // The review queue item ID if applicable
        /** @var array<MatchedContent>|null */
        #[ArrayOf(MatchedContent::class)]
        public ?array $matchedContents = null, // Ordered list of contents whose verdicts contributed to an aggregation rule's threshold. Populated only for aggregation rules when callers supplied `content_ids`.
        public ?IntentEvaluationInfo $intent = null,
        public ?int $appID = null, // Application ID the rule belongs to.
        public ?string $category = null, // The `category` sent on the labels request. Omitted when the event was not produced by the labels API.
        public ?array $scope = null, // The rule's config_keys. Omitted when the rule is application-wide.
        public ?int $threshold = null, // Configured count that fires the condition. This is the number stored on the rule, not the live counter.
        public ?string $timeWindow = null, // Configured window of the condition that fired, for example 10m.
        public ?array $matchedUserIds = null, // Cross-user webhook_only flood rules only: the distinct users who sent the content since the previous webhook for this rule. Omitted on other events.
        public ?AppCountInfo $appCount = null,
        public ?string $channelCid = null, // CID of the channel the moderated content belongs to. Omitted when the content has no channel.
        public ?array $matchedLabels = null, // Harm labels on the moderated content that the rule's text label conditions (`text_content`, `text_rule`) matched. Omitted when the rule has no such condition.
        public ?string $severity = null, // Highest severity (`LOW` / `MEDIUM` / `HIGH` / `CRITICAL`) among the moderation results that carried a matched label. Omitted when no label matched or the provider reports no severity.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
