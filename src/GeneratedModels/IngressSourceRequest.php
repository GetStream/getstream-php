<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class IngressSourceRequest extends BaseModel
{
    public function __construct(
        public ?int $fps = null,
        public ?int $height = null,
        public ?int $width = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
