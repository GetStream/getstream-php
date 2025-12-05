<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<ParticipantCountByMinuteResponse>|null $byMinute
 */
class ParticipantCountOverTimeResponse extends BaseModel
{
    public function __construct(
        /** @var array<ParticipantCountByMinuteResponse>|null */
        #[ArrayOf(ParticipantCountByMinuteResponse::class)]
        public ?array $byMinute = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
