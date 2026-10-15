<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IntentScoreResponse extends BaseModel
{
    public function __construct(
        public ?string $topic = null,
        public ?int $score = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
