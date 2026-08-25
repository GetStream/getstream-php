<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PredefinedFilterResponse extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?string $description = null,
        public ?string $operation = null,
        public ?object $filter = null,
        /** @var array<SortParam>|null */
        #[ArrayOf(SortParam::class)]
        public ?array $sort = null,
        public ?int $queryID = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?PredefinedFilterStatsResponse $stats = null,
        public ?PerformanceAnalysisResponse $performance = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
