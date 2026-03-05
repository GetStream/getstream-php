<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class UnreadCountsBatchResponse extends BaseModel
{
    public function __construct(
        /** @var array<string, UnreadCountsResponse>|null */
        #[MapOf(UnreadCountsResponse::class)]
        public ?array $countsByUser = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
