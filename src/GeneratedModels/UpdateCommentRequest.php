<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateCommentRequest extends BaseModel
{
    public function __construct(
        public ?string $comment = null,    // Updated text content of the comment 
        public ?object $custom = null,    // Updated custom data for the comment 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
