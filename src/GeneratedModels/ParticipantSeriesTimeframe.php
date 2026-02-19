<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ParticipantSeriesTimeframe extends BaseModel
{
    public function __construct(
        public ?\DateTime $since = null,
        public ?\DateTime $until = null,
        public ?int $stepSeconds = null,
        public ?int $maxPoints = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
