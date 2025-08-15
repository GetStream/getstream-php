<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ModerationResponse extends BaseModel
{
    public function __construct(
        public ?string $action = null,
        public ?int $explicit = null,
        public ?int $spam = null,
        public ?int $toxic = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
