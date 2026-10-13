<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryCallRingAttemptsRequest extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of call
        public ?string $id = null, // Call ID
        public ?string $callSessionID = null, // Limit the attempts to one call session; omit to read every session of the call
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
