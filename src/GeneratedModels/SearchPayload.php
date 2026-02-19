<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SearchPayload extends BaseModel
{
    public function __construct(
        public ?MessageOptions $messageOptions = null,
        public ?string $query = null, // Search phrase
        public ?object $filterConditions = null, // Channel filter conditions
        public ?object $messageFilterConditions = null, // Message filter conditions
        public ?int $limit = null, // Number of messages to return
        public ?int $offset = null, // Pagination offset. Cannot be used with sort or next.
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Sort parameters. Cannot be used with non-zero offset
        public ?string $next = null, // Pagination parameter. Cannot be used with non-zero offset.
        public ?bool $forceDefaultSearch = null,
        public ?bool $forceSqlV2Backend = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
