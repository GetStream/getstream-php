<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RingCallResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $membersIds = null,    // List of members ringing notification was sent to 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
