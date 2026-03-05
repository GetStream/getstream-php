<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request to update a SIP Inbound Routing Rule
 */
class UpdateSIPInboundRoutingRuleRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null, // Name of the SIP Inbound Routing Rule
        public ?array $trunkIds = null, // List of SIP trunk IDs
        public ?array $calledNumbers = null, // List of called numbers
        public ?array $callerNumbers = null, // List of caller numbers (optional)
        public ?SIPDirectRoutingRuleCallConfigsRequest $directRoutingConfigs = null,
        public ?SIPInboundRoutingRulePinConfigsRequest $pinRoutingConfigs = null,
        public ?SIPCallerConfigsRequest $callerConfigs = null,
        public ?SIPCallConfigsRequest $callConfigs = null,
        public ?SIPPinProtectionConfigsRequest $pinProtectionConfigs = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
