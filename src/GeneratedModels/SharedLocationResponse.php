<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $channelCid
 * @property \DateTime $createdAt
 * @property string $createdByDeviceID
 * @property string $duration
 * @property int $latitude
 * @property int $longitude
 * @property string $messageID
 * @property \DateTime $updatedAt
 * @property string $userID
 * @property \DateTime|null $endAt
 * @property ChannelResponse|null $channel
 * @property MessageResponse|null $message
 */
class SharedLocationResponse extends BaseModel
{
    public function __construct(
        public ?string $channelCid = null, // Channel CID
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $createdByDeviceID = null, // Device ID that created the live location
        public ?string $duration = null,
        public ?int $latitude = null, // Latitude coordinate
        public ?int $longitude = null, // Longitude coordinate
        public ?string $messageID = null, // Message ID
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        public ?string $userID = null, // User ID
        public ?\DateTime $endAt = null, // Time when the live location expires
        public ?ChannelResponse $channel = null,
        public ?MessageResponse $message = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
