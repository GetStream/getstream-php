<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<CollectionResponse> $collections
 */
class CreateCollectionsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<CollectionResponse>|null List of created collections */
        #[ArrayOf(CollectionResponse::class)]
        public ?array $collections = null, // List of created collections
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
