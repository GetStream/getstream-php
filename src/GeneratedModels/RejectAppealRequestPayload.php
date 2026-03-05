<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for rejecting an appeal
 */
class RejectAppealRequestPayload extends BaseModel
{
    public function __construct(
        public ?string $decisionReason = null, // Reason for rejecting the appeal
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
