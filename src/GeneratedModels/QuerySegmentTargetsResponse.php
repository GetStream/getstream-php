<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QuerySegmentTargetsResponse extends BaseModel
{
    public function __construct(
        /** @var array<SegmentTargetResponse>|null */
        #[ArrayOf(SegmentTargetResponse::class)]
        public ?array $targets = null, // Targets
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
