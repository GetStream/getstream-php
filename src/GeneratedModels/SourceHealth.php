<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SourceHealth extends BaseModel
{
    public function __construct(
        public ?int $coHostPeak = null,
        /** @var array<SourceInterruption>|null */
        #[ArrayOf(SourceInterruption::class)]
        public ?array $interruptions = null,
        public ?int $deadAirS = null,
        /** @var array<PublisherSession>|null */
        #[ArrayOf(PublisherSession::class)]
        public ?array $publisherSessions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
