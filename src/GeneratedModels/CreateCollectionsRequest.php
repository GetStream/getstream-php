<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<CollectionRequest> $collections
 * @property string|null $userID
 * @property UserRequest|null $user
 */
class CreateCollectionsRequest extends BaseModel
{
    public function __construct(
        /** @var array<CollectionRequest>|null List of collections to create */
        #[ArrayOf(CollectionRequest::class)]
        public ?array $collections = null, // List of collections to create
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
