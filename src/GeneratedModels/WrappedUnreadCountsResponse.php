<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Basic response information
 */
class WrappedUnreadCountsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,    // Duration of the request in milliseconds 
        public ?int $totalUnreadCount = null,
        public ?int $totalUnreadThreadsCount = null,
        public ?array $channelType = null,
        public ?array $channels = null,
        public ?array $threads = null,
        public ?array $totalUnreadCountByTeam = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
