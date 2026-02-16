<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for restore action
 */
class RestoreActionRequestPayload extends BaseModel
{
    public function __construct(
        public ?string $decisionReason = null, // Reason for the appeal decision
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
