<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryAppealsResponse extends BaseModel
{
    public function __construct(
        /** @var array<AppealItemResponse>|null */
        #[ArrayOf(AppealItemResponse::class)]
        public ?array $items = null, // List of Appeal Items
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
