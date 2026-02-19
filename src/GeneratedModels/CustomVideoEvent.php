<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * A custom event, this event is used to send custom events to other participants in the call.
 */
class CustomVideoEvent extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null,
        public ?string $type = null, // The type of event, "custom" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?object $custom = null, // Custom data for this object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
