<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class GetCallParticipantSessionMetricsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?string $userID = null,
        public ?string $userSessionID = null,
        public ?string $publisherType = null,
        public ?SessionClient $client = null,
        public ?\DateTime $joinedAt = null,
        public ?bool $isPublisher = null,
        public ?bool $isSubscriber = null,
        /** @var array<PublishedTrackMetrics>|null */
        #[ArrayOf(PublishedTrackMetrics::class)]
        public ?array $publishedTracks = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
