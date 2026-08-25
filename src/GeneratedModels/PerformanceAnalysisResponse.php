<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PerformanceAnalysisResponse extends BaseModel
{
    public function __construct(
        public ?string $score = null,
        public ?string $analysisType = null,
        public ?array $indexedFields = null,
        public ?array $unindexedFields = null,
        public ?array $unindexedSortFields = null,
        public ?string $scanType = null,
        public ?array $warnings = null,
        public ?array $recommendations = null,
        public ?\DateTime $lastAnalyzed = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
