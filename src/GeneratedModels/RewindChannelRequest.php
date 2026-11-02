<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class RewindChannelRequest extends BaseModel
{
    public function __construct(
        public ?string $messageID = null, // ID of the top-level message to rewind the channel to. Every message created after it is hidden
        public ?bool $inclusive = null, // When true, `message_id` is hidden too and the message before it becomes the newest visible message
        public ?string $expectedLastMessageID = null, // ID of the newest visible message the caller saw. The rewind fails with a conflict when it is no longer the newest
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
