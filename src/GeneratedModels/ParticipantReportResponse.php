<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ParticipantReportResponse extends BaseModel
{
    public function __construct(
        public ?int $sum = null,
        public ?int $unique = null,
        public ?int $maxConcurrent = null,
        public ?array $byBrowser = null,
        public ?array $byCountry = null,
        public ?array $byDevice = null,
        public ?array $byOperatingSystem = null,
        public ?ParticipantCountOverTimeResponse $countOverTime = null,
        public ?PublisherStatsResponse $publishers = null,
        public ?SubscriberStatsResponse $subscribers = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
