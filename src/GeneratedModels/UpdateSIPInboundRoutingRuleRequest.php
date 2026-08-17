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
        public ?SIPDirectRoutingRuleCallConfigsRequest $directRoutingConfigs = null, // Configuration for direct routing rule calls
        public ?SIPInboundRoutingRulePinConfigsRequest $pinRoutingConfigs = null, // Configuration for PIN routing rule calls
        public ?SIPCallerConfigsRequest $callerConfigs = null, // Configuration for SIP caller settings
        public ?SIPCallConfigsRequest $callConfigs = null, // Configuration for SIP call settings
        public ?SIPPinProtectionConfigsRequest $pinProtectionConfigs = null, // Configuration for PIN protection settings
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
