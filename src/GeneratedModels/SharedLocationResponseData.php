<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SharedLocationResponseData extends BaseModel
{
    public function __construct(
        public ?string $channelCid = null, // The CID (type:id) of the channel that the location is attached to.
        public ?string $messageID = null, // The ID of the message that the location is attached to.
        public ?string $userID = null, // The ID of the user that created the location.
        public ?float $latitude = null, // The latitude of the location.
        public ?float $longitude = null, // The longitude of the location.
        public ?string $createdByDeviceID = null, // The ID of the device that created the location.
        public ?\DateTime $endAt = null, // The date when the location sharing ends., If it's empty, it means the location sharing is static instead of live.
        public ?\DateTime $createdAt = null, // The date when the location was created.
        public ?\DateTime $updatedAt = null, // The date when the location was updated.
        public ?MessageResponse $message = null, // Represents any chat message
        public ?ChannelResponse $channel = null, // Represents channel in chat
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
