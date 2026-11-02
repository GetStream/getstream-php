<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The location a scheduled message will share
 */
class ScheduledMessageLocation extends BaseModel
{
    public function __construct(
        public ?float $latitude = null, // The latitude of the location.
        public ?float $longitude = null, // The longitude of the location.
        public ?string $createdByDeviceID = null, // The ID of the device that created the location.
        public ?\DateTime $endAt = null, // The date when the location sharing ends., If it's empty, it means the location sharing is static instead of live.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
