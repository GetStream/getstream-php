<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ArrangeConfig extends BaseModel
{
    public function __construct(
        public ?string $mode = null, // Arrangement mode. Currently only 'blend' is supported; 'diversify' and 'slot' are reserved
        public ?string $key = null, // Activity field that defines a source. One of: type, user_id
        public ?float $tailBelow = null, // Activities scoring strictly below this value are moved to the end of the feed, in score order, before the mode runs. 0 is a valid value. Must be greater than exclude_below when both are set
        public ?BlendArrangeConfig $blend = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
