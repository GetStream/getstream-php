<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a user begins streaming into a call
 */
class IngressStartedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "ingress.started" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?string $ingressStreamID = null, // Unique identifier for this stream
        public ?string $userID = null, // User who started the stream
        public ?string $publisherType = null, // Streaming protocol (e.g., 'rtmps', 'srt', 'rtmp', 'rtsp')
        public ?string $clientName = null, // Streaming client software name (e.g., 'OBS Studio')
        public ?string $version = null, // Client software version
        public ?string $clientIp = null, // Client IP address
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
