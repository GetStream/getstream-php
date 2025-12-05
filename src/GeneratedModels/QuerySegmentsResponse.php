<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<SegmentResponse> $segments
 * @property string|null $next
 * @property string|null $prev
 */
class QuerySegmentsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        /** @var array<SegmentResponse>|null Segments */
        #[ArrayOf(SegmentResponse::class)]
        public ?array $segments = null, // Segments
        public ?string $next = null,
        public ?string $prev = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
