<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Response containing the updated SIP Inbound Routing Rule
 */
class UpdateSIPInboundRoutingRuleResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?SIPInboundRoutingRuleResponse $sipInboundRoutingRule = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
