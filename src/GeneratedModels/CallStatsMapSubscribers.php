<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<CallStatsMapLocation> $locations
 * @property array<CallStatsMapSubscriber>|null $participants
 */
class CallStatsMapSubscribers extends BaseModel
{
    public function __construct(
        /** @var array<CallStatsMapLocation>|null */
        #[ArrayOf(CallStatsMapLocation::class)]
        public ?array $locations = null,
        /** @var array<CallStatsMapSubscriber>|null */
        #[ArrayOf(CallStatsMapSubscriber::class)]
        public ?array $participants = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
