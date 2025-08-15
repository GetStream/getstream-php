<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class BulkImageModerationResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?string $taskID = null,    // ID of the task for processing the bulk image moderation 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
