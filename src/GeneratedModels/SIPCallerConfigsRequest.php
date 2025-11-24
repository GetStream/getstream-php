<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Configuration for SIP caller settings
 */
class SIPCallerConfigsRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null,    // Unique identifier for the caller (handlebars template) 
        public ?object $customData = null,    // Custom data associated with the caller (values are handlebars templates) 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
