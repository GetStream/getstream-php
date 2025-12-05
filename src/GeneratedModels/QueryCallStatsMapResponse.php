<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 *
 * @property string $callID
 * @property string $callSessionID
 * @property string $callType
 * @property string $duration
 * @property CallStatsParticipantCounts $counts
 * @property \DateTime|null $callEndedAt
 * @property \DateTime|null $callStartedAt
 * @property string|null $dataSource
 * @property \DateTime|null $endTime
 * @property \DateTime|null $generatedAt
 * @property \DateTime|null $startTime
 * @property CallStatsMapPublishers|null $publishers
 * @property CallStatsMapSFUs|null $sfus
 * @property CallStatsMapSubscribers|null $subscribers
 */
class QueryCallStatsMapResponse extends BaseModel
{
    public function __construct(
        public ?string $callID = null,
        public ?string $callSessionID = null,
        public ?string $callType = null,
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?CallStatsParticipantCounts $counts = null,
        public ?\DateTime $callEndedAt = null,
        public ?\DateTime $callStartedAt = null,
        public ?string $dataSource = null,
        public ?\DateTime $endTime = null,
        public ?\DateTime $generatedAt = null,
        public ?\DateTime $startTime = null,
        public ?CallStatsMapPublishers $publishers = null,
        public ?CallStatsMapSFUs $sfus = null,
        public ?CallStatsMapSubscribers $subscribers = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
