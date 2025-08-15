<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * CallStateResponseFields is the payload for call state response
 */
class CallStateResponseFields extends BaseModel
{
    public function __construct(
        public ?array $members = null,    // List of call members 
        public ?array $ownCapabilities = null,
        public ?CallResponse $call = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
