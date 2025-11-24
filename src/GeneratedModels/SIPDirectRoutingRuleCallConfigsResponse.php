<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Direct routing rule call configuration response
 */
class SIPDirectRoutingRuleCallConfigsResponse extends BaseModel
{
    public function __construct(
        public ?string $callID = null,    // ID of the call 
        public ?string $callType = null,    // Type of the call 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
