<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $score
 * @property \DateTime|null $endedAt
 * @property \DateTime|null $startedAt
 */
class CallReportResponse extends BaseModel
{
    public function __construct(
        public ?int $score = null,
        public ?\DateTime $endedAt = null,
        public ?\DateTime $startedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
