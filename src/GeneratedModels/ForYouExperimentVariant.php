<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ForYouExperimentVariant extends BaseModel
{
    public function __construct(
        public ?string $view = null, // ID of an existing feed view
        public ?int $weight = null, // Share of users in percent, 1 to 100
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
