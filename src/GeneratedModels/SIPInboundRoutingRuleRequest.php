<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Request to create or update a SIP Inbound Routing Rule
 */
class SIPInboundRoutingRuleRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null,    // Name of the SIP Inbound Routing Rule 
        public ?array $trunkIds = null,    // List of SIP trunk IDs 
        public ?SIPCallerConfigsRequest $callerConfigs = null,
        public ?array $calledNumbers = null,    // List of called numbers 
        public ?array $callerNumbers = null,    // List of caller numbers (optional) 
        public ?SIPCallConfigsRequest $callConfigs = null,
        public ?SIPDirectRoutingRuleCallConfigsRequest $directRoutingConfigs = null,
        public ?SIPPinProtectionConfigsRequest $pinProtectionConfigs = null,
        public ?SIPInboundRoutingRulePinConfigsRequest $pinRoutingConfigs = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
