<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RingSettings extends BaseModel
{
    public function __construct(
        public ?int $autoCancelTimeoutMs = null,
        public ?int $incomingCallTimeoutMs = null,
        public ?int $missedCallTimeoutMs = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
