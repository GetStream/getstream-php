<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * SIP Inbound Routing Rule response
 *
 * @property \DateTime $createdAt
 * @property string $duration
 * @property string $id
 * @property string $name
 * @property \DateTime $updatedAt
 * @property array $calledNumbers
 * @property array $trunkIds
 * @property array|null $callerNumbers
 * @property SIPCallConfigsResponse|null $callConfigs
 * @property SIPCallerConfigsResponse|null $callerConfigs
 * @property SIPDirectRoutingRuleCallConfigsResponse|null $directRoutingConfigs
 * @property SIPPinProtectionConfigsResponse|null $pinProtectionConfigs
 * @property SIPInboundRoutingRulePinConfigsResponse|null $pinRoutingConfigs
 */
class SIPInboundRoutingRuleResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Creation timestamp
        public ?string $duration = null,
        public ?string $id = null, // Unique identifier of the SIP Inbound Routing Rule
        public ?string $name = null, // Name of the SIP Inbound Routing Rule
        public ?\DateTime $updatedAt = null, // Last update timestamp
        public ?array $calledNumbers = null, // List of called numbers
        public ?array $trunkIds = null, // List of SIP trunk IDs
        public ?array $callerNumbers = null, // List of caller numbers
        public ?SIPCallConfigsResponse $callConfigs = null,
        public ?SIPCallerConfigsResponse $callerConfigs = null,
        public ?SIPDirectRoutingRuleCallConfigsResponse $directRoutingConfigs = null,
        public ?SIPPinProtectionConfigsResponse $pinProtectionConfigs = null,
        public ?SIPInboundRoutingRulePinConfigsResponse $pinRoutingConfigs = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
