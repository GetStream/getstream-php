<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Request to resolve SIP inbound routing using challenge authentication
 */
class ResolveSipInboundRequest extends BaseModel
{
    public function __construct(
        public ?string $sipCallerNumber = null,    // SIP caller number 
        public ?string $sipTrunkNumber = null,    // SIP trunk number to resolve 
        public ?SIPChallenge $challenge = null,
        public ?array $sipHeaders = null,    // Optional SIP headers as key-value pairs 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
