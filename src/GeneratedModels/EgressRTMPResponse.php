<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EgressRTMPResponse extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?\DateTime $startedAt = null,
        public ?string $streamKey = null,
        public ?string $streamUrl = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
