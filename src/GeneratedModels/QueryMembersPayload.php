<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Client request
 *
 * @property string $type
 * @property object $filterConditions
 * @property string|null $id
 * @property int|null $limit
 * @property int|null $offset
 * @property string|null $userID
 * @property array<ChannelMemberRequest>|null $members
 * @property array<SortParamRequest>|null $sort
 * @property UserRequest|null $user
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
        /** @var array<ChannelMemberRequest>|null */
        #[ArrayOf(ChannelMemberRequest::class)]
        public ?array $members = null,
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
