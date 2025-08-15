<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EnrichedActivity extends BaseModel
{
    public function __construct(
        public ?string $foreignID = null,
        public ?string $id = null,
        public ?int $score = null,
        public ?string $verb = null,
        public ?array $to = null,
        public ?Data $actor = null,
        public ?array $latestReactions = null,
        public ?Data $object = null,
        public ?Data $origin = null,
        public ?array $ownReactions = null,
        public ?array $reactionCounts = null,
        public ?Data $target = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
