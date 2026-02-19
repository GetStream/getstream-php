<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent automatically whenever a rule builder rule is triggered
 */
class ModerationRulesTriggeredEvent extends BaseModel
{
    public function __construct(
        public ?ModerationRuleInfo $rule = null,
        public ?string $type = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?int $violationNumber = null, // The violation number for call rules (optional)
        public ?string $entityID = null, // The ID of the entity that triggered the rule
        public ?string $entityType = null, // The type of the entity (call, user, message, etc.)
        public ?string $userID = null, // The ID of the user who triggered the rule
        public ?array $triggeredActions = null, // Array of action types that were triggered
        public ?string $reviewQueueItemID = null, // The review queue item ID if applicable
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
