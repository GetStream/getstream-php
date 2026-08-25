<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdatePredefinedFilterRequest extends BaseModel
{
    public function __construct(
        public ?string $description = null, // The description of the predefined filter
        public ?string $operation = null, // The operation this filter is for (e.g., QueryChannels)
        public ?object $filter = null, // Filter to apply to the query
        public ?array $sort = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
