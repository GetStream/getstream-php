<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $mode
 * @property string|null $serverUrl
 */
class AsyncModerationCallbackConfig extends BaseModel
{
    public function __construct(
        public ?string $mode = null,
        public ?string $serverUrl = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
