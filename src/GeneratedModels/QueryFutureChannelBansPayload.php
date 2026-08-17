<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryFutureChannelBansPayload extends BaseModel
{
    public function __construct(
        public ?int $limit = null, // Number of records to return
        public ?int $offset = null, // Number of records to offset
        public ?bool $excludeExpiredBans = null, // Whether to exclude expired bans or not
        public ?bool $includeTotal = null, // When true, the response includes the total number of bans matching the query filter (independent of limit and offset, capped at 100000)
        public ?string $targetUserID = null, // Filter by the target user ID. Server-side: returns all bans against this user. Client-side: narrows the authenticated user's own bans to this target.
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
