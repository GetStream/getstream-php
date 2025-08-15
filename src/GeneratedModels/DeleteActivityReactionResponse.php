<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class DeleteActivityReactionResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?ActivityResponse $activity = null,
        public ?FeedsReactionResponse $reaction = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
