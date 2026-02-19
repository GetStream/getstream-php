<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class VoteData extends BaseModel
{
    public function __construct(
        public ?string $optionID = null,
        public ?string $answerText = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
