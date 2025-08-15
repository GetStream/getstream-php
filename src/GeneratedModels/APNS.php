<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class APNS extends BaseModel
{
    public function __construct(
        public ?string $body = null,
        public ?string $title = null,
        public ?int $contentAvailable = null,
        public ?int $mutableContent = null,
        public ?string $sound = null,
        public ?object $data = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
