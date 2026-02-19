<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelExport extends BaseModel
{
    public function __construct(
        public ?string $type = null, // Channel type
        public ?string $id = null, // Channel ID
        public ?string $cid = null,
        public ?\DateTime $messagesSince = null, // Date to export messages since
        public ?\DateTime $messagesUntil = null, // Date to export messages until
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
