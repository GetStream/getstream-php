<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AgentReviewSummaryResponse extends BaseModel
{
    public function __construct(
        public ?string $status = null, // pending, processing, done, failed, or skipped
        public ?string $flagAssessment = null, // Whether the flag matches the content. Set once the review is done
        public ?string $recommendedAction = null, // The action Nora recommends. Set once the review is done
        public ?float $confidence = null, // Verdict confidence from 0 to 1
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
