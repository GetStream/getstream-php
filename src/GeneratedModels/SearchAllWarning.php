<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SearchAllWarning extends BaseModel
{
    public function __construct(
        public ?string $code = null, // Warning code. cursor_rejected: the cursor supplied for this section failed to decode, so the section restarted from page 1
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
