<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<CountByMinuteResponse>|null $countOverTime
 */
class MessageStatsResponse extends BaseModel
{
    public function __construct(
        /** @var array<CountByMinuteResponse>|null */
        #[ArrayOf(CountByMinuteResponse::class)]
        public ?array $countOverTime = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
