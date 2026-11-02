<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * A rewind of an agent channel
 */
class ChannelRewindResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // ID of the rewind
        public ?string $messageID = null, // ID of the message the channel was rewound to
        public ?bool $inclusive = null, // Whether `message_id` was hidden too
        public ?int $hiddenCountAtRewind = null, // Number of messages the rewind hid that were not hidden already
        public ?\DateTime $createdAt = null, // Date/time of the rewind
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
