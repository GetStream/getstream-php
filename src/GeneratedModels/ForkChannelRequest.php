<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ForkChannelRequest extends BaseModel
{
    public function __construct(
        public ?string $messageID = null, // ID of the top-level message to fork at. The fork copies the visible messages created up to it, itself included, and their replies up to it. Fork only at a message the agent has finished writing: a message still being streamed is copied as it is at the time of the fork
        public ?ForkChannelTarget $channel = null, // The channel a fork creates
        public ?bool $excludeAttachments = null, // When true, the copied messages carry no attachments. By default attachments are copied
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
