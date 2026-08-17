<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BroadcastInfo extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?string $callSessionID = null,
        public ?string $callType = null,
        public ?int $appID = null,
        public ?string $startedAt = null,
        public ?string $endedAt = null,
        public ?float $durationMin = null,
        public ?string $sourceMode = null,
        public ?array $creators = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
