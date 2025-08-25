<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedsEventPreferences extends BaseModel
{
    public function __construct(
        public ?string $comments = null,
        public ?string $mentions = null,
        public ?string $newFollowers = null,
        public ?string $reactions = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
