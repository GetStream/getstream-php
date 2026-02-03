<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a critical error occurs that breaks the streaming pipeline
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property string $error
 * @property string $ingressStreamID
 * @property string $userID
 * @property string $type
 * @property string|null $code
 */
class IngressErrorEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $error = null, // Human-readable error message
        public ?string $ingressStreamID = null, // Unique identifier for the stream
        public ?string $userID = null, // User who was streaming
        public ?string $type = null, // The type of event: "ingress.error" in this case
        public ?string $code = null, // Error code
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
