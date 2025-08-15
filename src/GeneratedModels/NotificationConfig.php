<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class NotificationConfig extends BaseModel
{
    public function __construct(
        public ?bool $trackRead = null,    // Whether to track read status 
        public ?bool $trackSeen = null,    // Whether to track seen status 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
