<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class OwnCapabilitiesBatchResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $capabilities = null,    // Map of feed ID to capabilities array 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
