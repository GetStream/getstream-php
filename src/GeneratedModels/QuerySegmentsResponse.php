<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QuerySegmentsResponse extends BaseModel
{
    public function __construct(
        /** @var array<SegmentResponse>|null */
        #[ArrayOf(SegmentResponse::class)]
        public ?array $segments = null, // Segments
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
