<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request to determine SIP trunk authentication requirements
 */
class ResolveSipAuthRequest extends BaseModel
{
    public function __construct(
        public ?string $sipTrunkNumber = null, // SIP trunk number to look up
        public ?string $sipCallerNumber = null, // SIP caller number
        public ?string $sourceIp = null, // Transport-layer source IP address of the SIP request
        public ?string $fromHost = null, // Host from the SIP From header
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
