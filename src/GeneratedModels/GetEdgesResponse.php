<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class GetEdgesResponse extends BaseModel
{
    public function __construct(
        /** @var array<EdgeResponse>|null */
        #[ArrayOf(EdgeResponse::class)]
        public ?array $edges = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
