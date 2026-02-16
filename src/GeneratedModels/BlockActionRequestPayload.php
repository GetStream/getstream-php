<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for block action
 */
class BlockActionRequestPayload extends BaseModel
{
    public function __construct(
        public ?string $reason = null, // Reason for blocking
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
