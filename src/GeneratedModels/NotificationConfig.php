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
        public ?string $deduplicationWindow = null,    // Time window for deduplicating notification activities (reactions and follows). Empty or '0' = always deduplicate (default). Examples: '1h', '24h', '7d', '1w' 
        public ?bool $trackRead = null,    // Whether to track read status 
        public ?bool $trackSeen = null,    // Whether to track seen status 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
