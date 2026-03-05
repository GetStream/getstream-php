<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateCollectionsResponse extends BaseModel
{
    public function __construct(
        /** @var array<CollectionResponse>|null */
        #[ArrayOf(CollectionResponse::class)]
        public ?array $collections = null, // List of updated collections
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
