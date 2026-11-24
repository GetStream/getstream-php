<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryAppealsResponse extends BaseModel
{
    public function __construct(
        /** @var array<AppealItemResponse>|null */
        #[ArrayOf(AppealItemResponse::class)]
        public ?array $items = null, // List of Appeal Items
        public ?int $total = null, // Number of appeals matching the filter, returned when include_count is set. When capped is true, at least this many appeals match.
        public ?bool $capped = null, // Whether more appeals match than are counted exactly (1,000), so total is a lower bound. Returned when include_count is set.
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
