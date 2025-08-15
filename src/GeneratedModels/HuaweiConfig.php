<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class HuaweiConfig extends BaseModel
{
    public function __construct(
        public ?bool $disabled = null,
        public ?string $id = null,
        public ?string $secret = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
