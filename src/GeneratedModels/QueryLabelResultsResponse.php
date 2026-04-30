<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryLabelResultsResponse extends BaseModel
{
    public function __construct(
        /** @var array<LabelResultResponse>|null */
        #[ArrayOf(LabelResultResponse::class)]
        public ?array $labelResults = null, // List of moderation label results
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
