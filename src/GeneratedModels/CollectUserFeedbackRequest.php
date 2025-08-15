<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CollectUserFeedbackRequest extends BaseModel
{
    public function __construct(
        public ?int $rating = null,
        public ?string $sdk = null,
        public ?string $sdkVersion = null,
        public ?string $reason = null,
        public ?string $userSessionID = null,
        public ?object $custom = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
