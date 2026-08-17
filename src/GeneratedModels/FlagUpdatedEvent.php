<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FlagUpdatedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?MessageResponse $message = null, // Represents any chat message
        public ?UserResponse $user = null, // User response object
        public ?UserResponse $createdBy = null, // User response object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
