<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SharedLocationResponseData extends BaseModel
{
    public function __construct(
        public ?string $channelCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $createdByDeviceID = null,
        public ?int $latitude = null,
        public ?int $longitude = null,
        public ?string $messageID = null,
        public ?\DateTime $updatedAt = null,
        public ?string $userID = null,
        public ?\DateTime $endAt = null,
        public ?ChannelResponse $channel = null,
        public ?MessageResponse $message = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
