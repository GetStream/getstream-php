<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response confirming SIP trunk deletion
 *
 * @property string $duration
 */
class DeleteSIPTrunkResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
