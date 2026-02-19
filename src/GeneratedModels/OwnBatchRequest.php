<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request to get own_follows, own_followings, own_capabilities, and/or own_membership for multiple feeds. If fields is not specified, all fields are returned.
 */
class OwnBatchRequest extends BaseModel
{
    public function __construct(
        public ?UserRequest $user = null,
        public ?array $feeds = null, // List of feed IDs to get own fields for
        public ?array $fields = null, // Optional list of specific fields to return. If not specified, all fields (own_follows, own_followings, own_capabilities, own_membership) are returned
        public ?string $userID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
