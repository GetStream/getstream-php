<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * One user who marked the message, and when.
 */
class MessageMarkerResponse extends BaseModel
{
    public function __construct(
        public ?string $userID = null, // The user who marked the message
        public ?\DateTime $createdAt = null, // When the mark was written
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
