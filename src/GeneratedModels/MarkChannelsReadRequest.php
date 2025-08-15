<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MarkChannelsReadRequest extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        public ?array $readByChannel = null,    // Map of channel ID to last read message ID 
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
