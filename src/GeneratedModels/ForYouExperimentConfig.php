<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ForYouExperimentConfig extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Experiment identifier, 1 to 64 letters, digits, dashes or underscores
        /** @var array<ForYouExperimentVariant>|null */
        #[ArrayOf(ForYouExperimentVariant::class)]
        public ?array $variants = null, // 2 to 4 feed views with distinct ids; weights are percents summing to 100
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
