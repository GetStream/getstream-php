<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for escalation action
 */
class EscalatePayload extends BaseModel
{
    public function __construct(
        public ?string $reason = null, // Reason for the escalation (from configured escalation_reasons)
        public ?string $notes = null, // Additional context for the reviewer
        public ?string $priority = null, // Priority of the escalation (low, medium, high)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
