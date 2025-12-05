<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * A custom event, this event is used to send custom events to other participants in the call.
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property object $custom
 * @property UserResponse $user
 * @property string $type
 */
class CustomVideoEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?object $custom = null, // Custom data for this object
        public ?UserResponse $user = null,
        public ?string $type = null, // The type of event, "custom" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
