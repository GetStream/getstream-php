<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Response containing the updated SIP trunk
 */
class UpdateSIPTrunkResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?SIPTrunkResponse $sipTrunk = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
