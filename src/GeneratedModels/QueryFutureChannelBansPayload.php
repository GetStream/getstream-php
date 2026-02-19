<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryFutureChannelBansPayload extends BaseModel
{
    public function __construct(
        public ?UserRequest $user = null,
        public ?int $limit = null, // Number of records to return
        public ?int $offset = null, // Number of records to offset
        public ?bool $excludeExpiredBans = null, // Whether to exclude expired bans or not
        public ?string $targetUserID = null, // Filter by the target user ID. For server-side requests only.
        public ?string $userID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
