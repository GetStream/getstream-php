<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryDeletedChannelsResponse extends BaseModel
{
    public function __construct(
        /** @var array<ChannelResponse>|null */
        #[ArrayOf(ChannelResponse::class)]
        public ?array $channels = null, // Soft-deleted channels matching the filter, each with deleted_at set
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
