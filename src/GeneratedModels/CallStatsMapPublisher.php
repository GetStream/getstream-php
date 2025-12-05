<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $isLive
 * @property string $userID
 * @property string $userSessionID
 * @property PublishedTrackFlags $publishedTracks
 * @property string|null $name
 * @property string|null $publisherType
 * @property CallStatsLocation|null $location
 */
class CallStatsMapPublisher extends BaseModel
{
    public function __construct(
        public ?bool $isLive = null,
        public ?string $userID = null,
        public ?string $userSessionID = null,
        public ?PublishedTrackFlags $publishedTracks = null,
        public ?string $name = null,
        public ?string $publisherType = null,
        public ?CallStatsLocation $location = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
