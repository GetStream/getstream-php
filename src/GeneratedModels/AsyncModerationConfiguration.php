<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AsyncModerationConfiguration extends BaseModel
{
    public function __construct(
        public ?AsyncModerationCallbackConfig $callback = null,
        public ?int $timeoutMs = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
