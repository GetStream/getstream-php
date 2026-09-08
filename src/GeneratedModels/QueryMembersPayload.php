<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryMembersPayload extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?string $id = null,
        /** @var array<ChannelMemberRequest>|null */
        #[ArrayOf(ChannelMemberRequest::class)]
        public ?array $members = null,
        public ?object $filterConditions = null, // Filter conditions to apply to the query
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Array of sort parameters
        public ?int $limit = null,
        public ?int $offset = null,
        public ?string $userIDGte = null,
        public ?string $userIDGt = null,
        public ?string $userIDLte = null,
        public ?string $userIDLt = null,
        public ?\DateTime $createdAtAfterOrEqual = null,
        public ?\DateTime $createdAtAfter = null,
        public ?\DateTime $createdAtBeforeOrEqual = null,
        public ?\DateTime $createdAtBefore = null,
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
