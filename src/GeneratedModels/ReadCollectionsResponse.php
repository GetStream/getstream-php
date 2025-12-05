<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<CollectionResponse> $collections
 */
class ReadCollectionsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<CollectionResponse>|null List of collections matching the query */
        #[ArrayOf(CollectionResponse::class)]
        public ?array $collections = null, // List of collections matching the query
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
