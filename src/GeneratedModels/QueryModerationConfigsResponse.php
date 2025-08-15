<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryModerationConfigsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $configs = null,    // List of moderation configurations 
        public ?string $next = null,
        public ?string $prev = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
