<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response containing resolved SIP inbound routing information
 *
 * @property string $duration
 * @property SipInboundCredentials $credentials
 * @property SIPInboundRoutingRuleResponse|null $sipRoutingRule
 * @property SIPTrunkResponse|null $sipTrunk
 */
class ResolveSipInboundResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?SipInboundCredentials $credentials = null,
        public ?SIPInboundRoutingRuleResponse $sipRoutingRule = null,
        public ?SIPTrunkResponse $sipTrunk = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
