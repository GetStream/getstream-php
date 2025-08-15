<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ReadStateResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $lastRead = null,
        public ?int $unreadMessages = null,
        public ?UserResponse $user = null,
        public ?string $lastReadMessageID = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
