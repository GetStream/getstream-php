<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response containing resolved SIP inbound routing information
 */
class ResolveSipInboundResponse extends BaseModel
{
    public function __construct(
        public ?SipInboundCredentials $credentials = null,
        public ?SIPInboundRoutingRuleResponse $sipRoutingRule = null,
        public ?SIPTrunkResponse $sipTrunk = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
