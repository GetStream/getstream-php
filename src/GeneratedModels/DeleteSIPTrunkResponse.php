<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Response confirming SIP trunk deletion
 */
class DeleteSIPTrunkResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
