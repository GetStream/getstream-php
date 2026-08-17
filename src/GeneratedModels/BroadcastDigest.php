<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BroadcastDigest extends BaseModel
{
    public function __construct(
        public ?string $schemaVersion = null,
        public ?BroadcastInfo $broadcast = null,
        public ?SourceHealth $source = null,
        public ?Audience $audience = null,
        public ?ViewerBehavior $viewers = null,
        public ?Quality $quality = null,
        public ?PoorTail $poorTail = null,
        public ?Segments $segments = null,
        public ?Joins $joins = null,
        public ?Coverage $coverage = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
