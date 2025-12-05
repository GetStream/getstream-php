<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $limit
 * @property int|null $memberLimit
 * @property int|null $messageLimit
 * @property int|null $offset
 * @property bool|null $state
 * @property string|null $userID
 * @property array<SortParamRequest>|null $sort
 * @property object|null $filterConditions
 * @property UserRequest|null $user
 */
class QueryChannelsRequest extends BaseModel
{
    public function __construct(
        public ?int $limit = null, // Number of channels to limit
        public ?int $memberLimit = null, // Number of members to limit
        public ?int $messageLimit = null, // Number of messages to limit
        public ?int $offset = null, // Channel pagination offset
        public ?bool $state = null, // Whether to update channel state or not
        public ?string $userID = null,
        /** @var array<SortParamRequest>|null List of sort parameters */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // List of sort parameters
        public ?object $filterConditions = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
