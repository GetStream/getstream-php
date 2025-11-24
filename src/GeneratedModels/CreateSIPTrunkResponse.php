<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Response containing the created SIP trunk
 */
class CreateSIPTrunkResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?SIPTrunkResponse $sipTrunk = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
