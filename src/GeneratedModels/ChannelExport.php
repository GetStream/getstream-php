<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ChannelExport extends BaseModel
{
    public function __construct(
        public ?string $cid = null,
        public ?string $id = null,    // Channel ID 
        public ?\DateTime $messagesSince = null,    // Date to export messages since 
        public ?\DateTime $messagesUntil = null,    // Date to export messages until 
        public ?string $type = null,    // Channel type 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
