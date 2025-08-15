<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Represents a user that is participating in a thread.
 */
class ThreadParticipant extends BaseModel
{
    public function __construct(
        public ?int $appPk = null,
        public ?string $channelCid = null,
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?\DateTime $lastReadAt = null,
        public ?object $custom = null,
        public ?\DateTime $lastThreadMessageAt = null,
        public ?\DateTime $leftThreadAt = null,    // Left Thread At is the time when the user left the thread 
        public ?string $threadID = null,    // Thead ID is unique string identifier of the thread 
        public ?string $userID = null,    // User ID is unique string identifier of the user 
        public ?UserResponse $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
