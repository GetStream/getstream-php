<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request to get own_follows, own_capabilities, and/or own_membership for multiple feeds. If fields is not specified, all three fields are returned.
 *
 * @property array $feeds
 * @property string|null $userID
 * @property array|null $fields
 * @property UserRequest|null $user
 */
class OwnBatchRequest extends BaseModel
{
    public function __construct(
        public ?array $feeds = null, // List of feed IDs to get own fields for
        public ?string $userID = null,
        public ?array $fields = null, // Optional list of specific fields to return. If not specified, all fields (own_follows, own_capabilities, own_membership) are returned
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
