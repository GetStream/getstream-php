<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryMessageFlagsPayload extends BaseModel
{
    public function __construct(
        public ?UserRequest $user = null,
        public ?object $filterConditions = null,
        public ?bool $showDeletedMessages = null, // Whether to include deleted messages in the results
        public ?int $limit = null,
        public ?int $offset = null,
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null,
        public ?string $userID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
