<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Client request
 */
class QueryUsersPayload extends BaseModel
{
    public function __construct(
        public ?UserRequest $user = null,
        public ?object $filterConditions = null,
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null,
        public ?bool $presence = null,
        public ?bool $includeDeactivatedUsers = null,
        public ?int $limit = null,
        public ?int $offset = null,
        public ?string $userID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
