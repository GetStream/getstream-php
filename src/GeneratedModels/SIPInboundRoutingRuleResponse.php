<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * SIP Inbound Routing Rule response
 */
class SIPInboundRoutingRuleResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Unique identifier of the SIP Inbound Routing Rule
        public ?string $name = null, // Name of the SIP Inbound Routing Rule
        public ?array $trunkIds = null, // List of SIP trunk IDs
        public ?array $calledNumbers = null, // List of called numbers
        public ?array $callerNumbers = null, // List of caller numbers
        public ?SIPDirectRoutingRuleCallConfigsResponse $directRoutingConfigs = null, // Direct routing rule call configuration response
        public ?SIPInboundRoutingRulePinConfigsResponse $pinRoutingConfigs = null, // PIN routing rule call configuration response
        public ?SIPCallerConfigsResponse $callerConfigs = null, // SIP caller configuration response
        public ?SIPCallConfigsResponse $callConfigs = null, // SIP call configuration response
        public ?SIPPinProtectionConfigsResponse $pinProtectionConfigs = null, // PIN protection configuration response
        public ?\DateTime $createdAt = null, // Creation timestamp
        public ?\DateTime $updatedAt = null, // Last update timestamp
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
