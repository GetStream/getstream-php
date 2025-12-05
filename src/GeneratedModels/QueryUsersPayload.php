<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property object $filterConditions
 * @property bool|null $includeDeactivatedUsers
 * @property int|null $limit
 * @property int|null $offset
 * @property bool|null $presence
 * @property string|null $userID
 * @property array<SortParamRequest>|null $sort
 * @property UserRequest|null $user
 */
class QueryUsersPayload extends BaseModel
{
    public function __construct(
        public ?object $filterConditions = null,
        public ?bool $includeDeactivatedUsers = null,
        public ?int $limit = null,
        public ?int $offset = null,
        public ?bool $presence = null,
        public ?string $userID = null,
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
