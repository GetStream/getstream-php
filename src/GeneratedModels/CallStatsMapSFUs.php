<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<SFULocationResponse> $locations
 */
class CallStatsMapSFUs extends BaseModel
{
    public function __construct(
        /** @var array<SFULocationResponse>|null */
        #[ArrayOf(SFULocationResponse::class)]
        public ?array $locations = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
