<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<CollectionRequest> $collections
 */
class UpsertCollectionsRequest extends BaseModel
{
    public function __construct(
        /** @var array<CollectionRequest>|null List of collections to upsert (insert if new, update if existing) */
        #[ArrayOf(CollectionRequest::class)]
        public ?array $collections = null, // List of collections to upsert (insert if new, update if existing)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
