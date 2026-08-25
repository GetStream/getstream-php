<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ActivityProcessorConfig extends BaseModel
{
    public function __construct(
        public ?string $type = null, // Type of activity processor (required)
        public ?int $minTextLength = null, // Minimum number of characters the activity text must have before this processor runs. 0 (the default) disables the check. Only applies to text_interest_tags.
        public ?int $minWordCount = null, // Minimum number of words the activity text must have before this processor runs. 0 (the default) disables the check. Only applies to text_interest_tags. Words are whitespace-separated, so scripts written without word spacing (Chinese, Japanese, Thai) always count as 1 word regardless of length — use min_text_length for those.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
