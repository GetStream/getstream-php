<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ParsedPredefinedFilterResponse extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?object $filter = null,
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
