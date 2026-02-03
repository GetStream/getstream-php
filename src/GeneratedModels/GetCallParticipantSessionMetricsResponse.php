<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 *
 * @property string $duration
 * @property bool|null $isPublisher
 * @property bool|null $isSubscriber
 * @property \DateTime|null $joinedAt
 * @property string|null $publisherType
 * @property string|null $userID
 * @property string|null $userSessionID
 * @property array<PublishedTrackMetrics>|null $publishedTracks
 * @property SessionClient|null $client
 */
class GetCallParticipantSessionMetricsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?bool $isPublisher = null,
        public ?bool $isSubscriber = null,
        public ?\DateTime $joinedAt = null,
        public ?string $publisherType = null,
        public ?string $userID = null,
        public ?string $userSessionID = null,
        /** @var array<PublishedTrackMetrics>|null */
        #[ArrayOf(PublishedTrackMetrics::class)]
        public ?array $publishedTracks = null,
        public ?SessionClient $client = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
