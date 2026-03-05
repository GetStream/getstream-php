<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class OwnBatchResponse extends BaseModel
{
    public function __construct(
        /** @var array<string, FeedOwnData>|null */
        #[MapOf(FeedOwnData::class)]
        public ?array $data = null, // Map of feed ID to own fields data
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
