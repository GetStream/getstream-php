<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RingSettingsRequest extends BaseModel
{
    public function __construct(
        public ?int $autoCancelTimeoutMs = null,    // When none of the callees accept a ring call in this time a rejection will be sent by the caller with reason 'timeout' by the SDKs 
        public ?int $incomingCallTimeoutMs = null,    // When a callee is online but doesn't answer a ring call in this time a rejection will be sent with reason 'timeout' by the SDKs 
        public ?int $missedCallTimeoutMs = null,    // When a callee doesn't accept or reject a ring call in this time a missed call event will be sent 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
