<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PublisherSession extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        public ?string $userSessionID = null,
        public ?string $ingest = null,
        public ?string $tool = null,
        public ?string $os = null,
        public ?string $browser = null,
        public ?float $startedOffsetMin = null,
        public ?float $durationMin = null,
        public ?string $deliveryZone = null,
        public ?float $sendQualityScore = null,
        public ?float $avgJitterMs = null,
        public ?EncodingProfile $encoding = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
