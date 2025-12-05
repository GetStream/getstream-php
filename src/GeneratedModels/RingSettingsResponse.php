<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $autoCancelTimeoutMs
 * @property int $incomingCallTimeoutMs
 * @property int $missedCallTimeoutMs
 */
class RingSettingsResponse extends BaseModel
{
    public function __construct(
        public ?int $autoCancelTimeoutMs = null,
        public ?int $incomingCallTimeoutMs = null,
        public ?int $missedCallTimeoutMs = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
