<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Segments extends BaseModel
{
    public function __construct(
        /** @var array<DeliveryZoneSegment>|null */
        #[ArrayOf(DeliveryZoneSegment::class)]
        public ?array $byDeliveryZone = null,
        /** @var array<BroadcastSegment>|null */
        #[ArrayOf(BroadcastSegment::class)]
        public ?array $bySdk = null,
        /** @var array<BroadcastSegment>|null */
        #[ArrayOf(BroadcastSegment::class)]
        public ?array $byOs = null,
        /** @var array<BroadcastSegment>|null */
        #[ArrayOf(BroadcastSegment::class)]
        public ?array $byBrowser = null,
        /** @var array<BroadcastSegment>|null */
        #[ArrayOf(BroadcastSegment::class)]
        public ?array $byCountry = null,
        public ?string $byCountryReason = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
