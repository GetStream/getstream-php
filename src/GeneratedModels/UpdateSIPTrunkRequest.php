<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request to update a SIP trunk
 *
 * @property string $name
 * @property array $numbers
 */
class UpdateSIPTrunkRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null, // Name of the SIP trunk
        public ?array $numbers = null, // Phone numbers associated with this SIP trunk
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
