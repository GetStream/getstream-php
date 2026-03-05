<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Client request
 */
class QueryMembersPayload extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?string $id = null,
        /** @var array<ChannelMemberRequest>|null */
        #[ArrayOf(ChannelMemberRequest::class)]
        public ?array $members = null,
        public ?object $filterConditions = null,
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null,
        public ?int $limit = null,
        public ?int $offset = null,
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
