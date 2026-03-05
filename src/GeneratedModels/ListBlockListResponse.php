<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class ListBlockListResponse extends BaseModel
{
    public function __construct(
        /** @var array<BlockListResponse>|null */
        #[ArrayOf(BlockListResponse::class)]
        public ?array $blocklists = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
