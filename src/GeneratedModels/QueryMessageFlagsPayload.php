<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $limit
 * @property int|null $offset
 * @property bool|null $showDeletedMessages
 * @property string|null $userID
 * @property array<SortParamRequest>|null $sort
 * @property object|null $filterConditions
 * @property UserRequest|null $user
 */
class QueryMessageFlagsPayload extends BaseModel
{
    public function __construct(
        public ?int $limit = null,
        public ?int $offset = null,
        public ?bool $showDeletedMessages = null, // Whether to include deleted messages in the results
        public ?string $userID = null,
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null,
        public ?object $filterConditions = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
