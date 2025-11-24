<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Response containing the list of SIP Inbound Routing Rules
 */
class ListSIPInboundRoutingRuleResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $sipInboundRoutingRules = null,    // List of SIP Inbound Routing Rules for the application 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
