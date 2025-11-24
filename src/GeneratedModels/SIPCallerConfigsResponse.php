<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * SIP caller configuration response
 */
class SIPCallerConfigsResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,    // Unique identifier for the caller 
        public ?object $customData = null,    // Custom data associated with the caller 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
