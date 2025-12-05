<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $timeoutMs
 * @property AsyncModerationCallbackConfig|null $callback
 */
class AsyncModerationConfiguration extends BaseModel
{
    public function __construct(
        public ?int $timeoutMs = null,
        public ?AsyncModerationCallbackConfig $callback = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
