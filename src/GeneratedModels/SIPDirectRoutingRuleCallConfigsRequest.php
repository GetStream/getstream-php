<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for direct routing rule calls
 *
 * @property string $callID
 * @property string $callType
 */
class SIPDirectRoutingRuleCallConfigsRequest extends BaseModel
{
    public function __construct(
        public ?string $callID = null, // ID of the call (handlebars template)
        public ?string $callType = null, // Type of the call
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
