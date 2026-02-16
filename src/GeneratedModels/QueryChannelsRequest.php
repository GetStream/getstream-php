<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class QueryChannelsRequest extends BaseModel
{
    public function __construct(
        public ?int $limit = null, // Number of channels to limit
        public ?int $memberLimit = null, // Number of members to limit
        public ?int $messageLimit = null, // Number of messages to limit
        public ?int $offset = null, // Channel pagination offset
        public ?string $predefinedFilter = null, // ID of a predefined filter to use instead of filter_conditions
        public ?bool $state = null, // Whether to update channel state or not
        public ?string $userID = null,
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // List of sort parameters
        public ?object $filterConditions = null,
        public ?object $filterValues = null, // Values to interpolate into the predefined filter template
        public ?object $sortValues = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
