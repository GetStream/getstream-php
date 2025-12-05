<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $foreignID
 * @property string|null $id
 * @property int|null $score
 * @property string|null $verb
 * @property array|null $to
 * @property Data|null $actor
 * @property array|null $latestReactions
 * @property Data|null $object
 * @property Data|null $origin
 * @property array|null $ownReactions
 * @property array|null $reactionCounts
 * @property Data|null $target
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
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
