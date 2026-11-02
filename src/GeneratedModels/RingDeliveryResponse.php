<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * One dispatch of a ring to one device over one channel.
 */
class RingDeliveryResponse extends BaseModel
{
    public function __construct(
        public ?string $deviceID = null, // The device the ring was dispatched to, empty for websocket deliveries which fan out to every connection
        public ?string $channel = null, // The transport the ring was dispatched over: ws, apns_voip, apns or fcm
        public ?\DateTime $sentAt = null, // When the ring was dispatched
        public ?\DateTime $providerAcceptedAt = null, // When the push provider accepted the dispatch; not populated yet
        public ?\DateTime $fetchedAt = null, // When the device fetched the call; not populated yet
        public ?\DateTime $ackedAt = null, // When the device acknowledged the ring; not populated yet
        public ?\DateTime $displayedAt = null, // When the device displayed the ring; not populated yet
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
