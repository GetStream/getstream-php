<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Deprecated: Use restore instead, which now also reverses a block or shadow block. Configuration for unblock action.
 */
class UnblockActionRequestPayload extends BaseModel
{
    public function __construct(
        public ?string $decisionReason = null, // Reason for the appeal decision
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
