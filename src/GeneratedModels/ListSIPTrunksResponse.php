<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Response containing the list of SIP trunks
 */
class ListSIPTrunksResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $sipTrunks = null,    // List of SIP trunks for the application 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
