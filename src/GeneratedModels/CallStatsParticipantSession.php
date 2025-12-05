<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $isLive
 * @property string $userSessionID
 * @property PublishedTrackFlags $publishedTracks
 * @property string|null $browser
 * @property string|null $browserVersion
 * @property int|null $cqScore
 * @property string|null $currentIp
 * @property string|null $currentSfu
 * @property int|null $distanceToSfuKilometers
 * @property \DateTime|null $endedAt
 * @property string|null $os
 * @property string|null $publisherType
 * @property string|null $sdk
 * @property string|null $sdkVersion
 * @property \DateTime|null $startedAt
 * @property string|null $unifiedSessionID
 * @property string|null $webrtcVersion
 * @property CallStatsLocation|null $location
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
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
