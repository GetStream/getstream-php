<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallStatsParticipantSession extends BaseModel
{
    public function __construct(
        public ?string $userSessionID = null,
        public ?string $unifiedSessionID = null,
        public ?\DateTime $startedAt = null,
        public ?\DateTime $endedAt = null,
        public ?bool $isLive = null,
        public ?string $publisherType = null,
        public ?string $sdk = null,
        public ?string $sdkVersion = null,
        public ?string $webrtcVersion = null,
        public ?string $browser = null,
        public ?string $browserVersion = null,
        public ?string $currentIp = null,
        public ?string $currentSfu = null,
        public ?float $distanceToSfuKilometers = null,
        public ?CallStatsLocation $location = null,
        public ?PublishedTrackFlags $publishedTracks = null,
        public ?int $cqScore = null,
        public ?string $os = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
