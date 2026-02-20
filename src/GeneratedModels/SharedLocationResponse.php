<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SharedLocationResponse extends BaseModel
{
    public function __construct(
        public ?string $channelCid = null, // Channel CID
        public ?string $messageID = null, // Message ID
        public ?string $userID = null, // User ID
        public ?int $latitude = null, // Latitude coordinate
        public ?int $longitude = null, // Longitude coordinate
        public ?string $createdByDeviceID = null, // Device ID that created the live location
        public ?\DateTime $endAt = null, // Time when the live location expires
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        public ?MessageResponse $message = null,
        public ?ChannelResponse $channel = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
