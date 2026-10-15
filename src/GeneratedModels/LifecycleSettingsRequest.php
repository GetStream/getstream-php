<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class LifecycleSettingsRequest extends BaseModel
{
    public function __construct(
        public ?string $mode = null, // Call lifecycle mode. One of: reusable, single_use. A single_use call cannot be reused once it has ended; the server ends it when its ring settles without an answer (currently: when the caller cancels the ring). Fixed at call creation
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
