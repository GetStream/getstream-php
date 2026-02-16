<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class UpdateCollectionsRequest extends BaseModel
{
    public function __construct(
        /** @var array<UpdateCollectionRequest>|null */
        #[ArrayOf(UpdateCollectionRequest::class)]
        public ?array $collections = null, // List of collections to update (only custom data is updatable)
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
