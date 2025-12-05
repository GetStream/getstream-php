<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $reason
 * @property array $cids
 */
class FailedChannelUpdates extends BaseModel
{
    public function __construct(
        public ?string $reason = null,
        public ?array $cids = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
