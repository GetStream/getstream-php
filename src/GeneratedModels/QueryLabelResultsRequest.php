<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryLabelResultsRequest extends BaseModel
{
    public function __construct(
        public ?object $filter = null, // Filter conditions. keyword searches the moderated content: "$q" matches whole words, while "$contains" is a case-insensitive substring match (text inside unspaced CJK sentences, word roots, emoji and symbols). "$contains" requires a date_range or created_at window within the last 7 days, at most 1 day long, or 7 days when the filter also narrows language to at most 3 non-empty values. The 7-day window is best effort: a language that covers most of an app's results can still time out.
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Sorting parameters
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
