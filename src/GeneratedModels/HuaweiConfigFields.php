<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class HuaweiConfigFields extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?string $id = null,
        public ?string $secret = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
