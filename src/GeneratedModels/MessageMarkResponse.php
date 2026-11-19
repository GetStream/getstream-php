<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * A mark one user put on one message, for example played on a voice note. A mark is written once and never removed by users.
 */
class MessageMarkResponse extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The mark type, for example played
        public ?string $messageID = null, // The marked message
        public ?string $userID = null, // The user who marked the message
        public ?\DateTime $createdAt = null, // When the mark was written
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
