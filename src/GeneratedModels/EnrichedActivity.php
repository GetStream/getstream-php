<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class EnrichedActivity extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?Data $actor = null,
        public ?string $verb = null,
        public ?Data $object = null,
        public ?string $foreignID = null,
        public ?Data $target = null,
        public ?Data $origin = null,
        public ?array $to = null,
        public ?float $score = null,
        public ?array $reactionCounts = null,
        public ?array $ownReactions = null,
        public ?array $latestReactions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
