<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryBannedUsersPayload extends BaseModel
{
    public function __construct(
        public ?object $filterConditions = null,
        public ?bool $excludeExpiredBans = null,    // Whether to exclude expired bans or not 
        public ?int $limit = null,    // Number of records to return 
        public ?int $offset = null,    // Number of records to offset 
        public ?string $userID = null,
        public ?array $sort = null,    // Array of sort parameters 
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
