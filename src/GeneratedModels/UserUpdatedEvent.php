<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when a user gets updated. The event contains information about the updated user.
 */
class UserUpdatedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?object $custom = null,
        public ?UserResponsePrivacyFields $user = null,
        public ?string $type = null,    // The type of event: "user.updated" in this case 
        public ?\DateTime $receivedAt = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
