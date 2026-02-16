<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class APNSPayload extends BaseModel
{
    public function __construct(
        public ?string $body = null,
        public ?int $contentAvailable = null,
        public ?int $mutableContent = null,
        public ?string $sound = null,
        public ?string $title = null,
        public ?object $data = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
