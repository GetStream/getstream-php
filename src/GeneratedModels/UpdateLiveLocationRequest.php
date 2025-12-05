<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $messageID
 * @property \DateTime|null $endAt
 * @property int|null $latitude
 * @property int|null $longitude
 */
class UpdateLiveLocationRequest extends BaseModel
{
    public function __construct(
        public ?string $messageID = null, // Live location ID
        public ?\DateTime $endAt = null, // Time when the live location expires
        public ?int $latitude = null, // Latitude coordinate
        public ?int $longitude = null, // Longitude coordinate
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
