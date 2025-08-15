<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Client request
 */
class QueryMembersPayload extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?object $filterConditions = null,
        public ?string $id = null,
        public ?int $limit = null,
        public ?int $offset = null,
        public ?string $userID = null,
        public ?array $members = null,
        public ?array $sort = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
