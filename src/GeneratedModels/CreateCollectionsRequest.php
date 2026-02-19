<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CreateCollectionsRequest extends BaseModel
{
    public function __construct(
        public ?UserRequest $user = null,
        /** @var array<CollectionRequest>|null */
        #[ArrayOf(CollectionRequest::class)]
        public ?array $collections = null, // List of collections to create
        public ?string $userID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
