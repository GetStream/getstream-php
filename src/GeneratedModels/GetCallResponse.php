<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class GetCallResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $members = null,
        public ?array $ownCapabilities = null,
        public ?CallResponse $call = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
