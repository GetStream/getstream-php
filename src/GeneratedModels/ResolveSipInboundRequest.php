<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request to resolve SIP inbound routing using challenge authentication
 *
 * @property string $sipCallerNumber
 * @property string $sipTrunkNumber
 * @property SIPChallenge $challenge
 * @property array|null $sipHeaders
 */
class ResolveSipInboundRequest extends BaseModel
{
    public function __construct(
        public ?string $sipCallerNumber = null, // SIP caller number
        public ?string $sipTrunkNumber = null, // SIP trunk number to resolve
        public ?SIPChallenge $challenge = null,
        public ?array $sipHeaders = null, // Optional SIP headers as key-value pairs
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
