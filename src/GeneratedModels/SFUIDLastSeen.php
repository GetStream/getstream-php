<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SFUIDLastSeen extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?\DateTime $lastSeen = null,
        public ?int $processStartTime = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
