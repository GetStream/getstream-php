<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response containing the list of SIP Inbound Routing Rules
 *
 * @property string $duration
 * @property array<SIPInboundRoutingRuleResponse> $sipInboundRoutingRules
 */
class ListSIPInboundRoutingRuleResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<SIPInboundRoutingRuleResponse>|null List of SIP Inbound Routing Rules for the application */
        #[ArrayOf(SIPInboundRoutingRuleResponse::class)]
        public ?array $sipInboundRoutingRules = null, // List of SIP Inbound Routing Rules for the application
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
