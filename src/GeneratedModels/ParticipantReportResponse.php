<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $sum
 * @property int $unique
 * @property int|null $maxConcurrent
 * @property array<GroupedStatsResponse>|null $byBrowser
 * @property array<GroupedStatsResponse>|null $byCountry
 * @property array<GroupedStatsResponse>|null $byDevice
 * @property array<GroupedStatsResponse>|null $byOperatingSystem
 * @property ParticipantCountOverTimeResponse|null $countOverTime
 * @property PublisherStatsResponse|null $publishers
 * @property SubscriberStatsResponse|null $subscribers
 */
class ParticipantReportResponse extends BaseModel
{
    public function __construct(
        public ?int $sum = null,
        public ?int $unique = null,
        public ?int $maxConcurrent = null,
        /** @var array<GroupedStatsResponse>|null */
        #[ArrayOf(GroupedStatsResponse::class)]
        public ?array $byBrowser = null,
        /** @var array<GroupedStatsResponse>|null */
        #[ArrayOf(GroupedStatsResponse::class)]
        public ?array $byCountry = null,
        /** @var array<GroupedStatsResponse>|null */
        #[ArrayOf(GroupedStatsResponse::class)]
        public ?array $byDevice = null,
        /** @var array<GroupedStatsResponse>|null */
        #[ArrayOf(GroupedStatsResponse::class)]
        public ?array $byOperatingSystem = null,
        public ?ParticipantCountOverTimeResponse $countOverTime = null,
        public ?PublisherStatsResponse $publishers = null,
        public ?SubscriberStatsResponse $subscribers = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
