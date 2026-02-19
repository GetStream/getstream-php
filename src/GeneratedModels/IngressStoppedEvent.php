<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when streaming stops due to user action or call ended
 */
class IngressStoppedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "ingress.stopped" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?string $ingressStreamID = null, // Unique identifier for the stream
        public ?string $userID = null, // User who was streaming
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
