<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response containing the list of SIP trunks
 */
class ListSIPTrunksResponse extends BaseModel
{
    public function __construct(
        /** @var array<SIPTrunkResponse>|null */
        #[ArrayOf(SIPTrunkResponse::class)]
        public ?array $sipTrunks = null, // List of SIP trunks for the application
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
