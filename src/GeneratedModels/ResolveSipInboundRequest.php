<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request to resolve SIP inbound routing using challenge authentication
 */
class ResolveSipInboundRequest extends BaseModel
{
    public function __construct(
        public ?SIPChallengeRequest $challenge = null,
        public ?string $sipTrunkNumber = null, // SIP trunk number to resolve
        public ?string $sipCallerNumber = null, // SIP caller number
        public ?array $sipHeaders = null, // Optional SIP headers as key-value pairs
        public ?string $routingNumber = null, // Optional routing number for routing number-based call routing (10 digits)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
