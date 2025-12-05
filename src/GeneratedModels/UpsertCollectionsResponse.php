<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<CollectionResponse> $collections
 */
class UpsertCollectionsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<CollectionResponse>|null List of upserted collections */
        #[ArrayOf(CollectionResponse::class)]
        public ?array $collections = null, // List of upserted collections
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
