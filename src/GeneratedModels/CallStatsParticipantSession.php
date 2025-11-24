<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallStatsParticipantSession extends BaseModel
{
    public function __construct(
        public ?bool $isLive = null,
        public ?string $userSessionID = null,
        public ?PublishedTrackFlags $publishedTracks = null,
        public ?string $browser = null,
        public ?string $browserVersion = null,
        public ?int $cqScore = null,
        public ?string $currentIp = null,
        public ?string $currentSfu = null,
        public ?int $distanceToSfuKilometers = null,
        public ?\DateTime $endedAt = null,
        public ?string $os = null,
        public ?string $publisherType = null,
        public ?string $sdk = null,
        public ?string $sdkVersion = null,
        public ?\DateTime $startedAt = null,
        public ?string $unifiedSessionID = null,
        public ?string $webrtcVersion = null,
        public ?CallStatsLocation $location = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
