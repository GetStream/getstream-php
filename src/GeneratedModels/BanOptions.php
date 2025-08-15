<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class BanOptions extends BaseModel
{
    public function __construct(
        public ?int $duration = null,
        public ?bool $ipBan = null,
        public ?string $reason = null,
        public ?bool $shadowBan = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
