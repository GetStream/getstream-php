<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * SIP Inbound Routing Rule response
 */
class SIPInboundRoutingRuleResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // Creation timestamp 
        public ?string $duration = null,
        public ?string $id = null,    // Unique identifier of the SIP Inbound Routing Rule 
        public ?string $name = null,    // Name of the SIP Inbound Routing Rule 
        public ?\DateTime $updatedAt = null,    // Last update timestamp 
        public ?array $calledNumbers = null,    // List of called numbers 
        public ?array $trunkIds = null,    // List of SIP trunk IDs 
        public ?array $callerNumbers = null,    // List of caller numbers 
        public ?SIPCallConfigsResponse $callConfigs = null,
        public ?SIPCallerConfigsResponse $callerConfigs = null,
        public ?SIPDirectRoutingRuleCallConfigsResponse $directRoutingConfigs = null,
        public ?SIPPinProtectionConfigsResponse $pinProtectionConfigs = null,
        public ?SIPInboundRoutingRulePinConfigsResponse $pinRoutingConfigs = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
