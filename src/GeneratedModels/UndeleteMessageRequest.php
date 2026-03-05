<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UndeleteMessageRequest extends BaseModel
{
    public function __construct(
        public ?string $undeletedBy = null, // ID of the user who is undeleting the message
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
