<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<CountByMinuteResponse>|null $byMinute
 */
class VideoReactionOverTimeResponse extends BaseModel
{
    public function __construct(
        /** @var array<CountByMinuteResponse>|null */
        #[ArrayOf(CountByMinuteResponse::class)]
        public ?array $byMinute = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
