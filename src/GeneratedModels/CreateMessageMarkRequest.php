<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CreateMessageMarkRequest extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The mark type: a built-in type such as played (the acting user played the message's audio, voiceRecording or video attachment) or a type the app defines in its message_marks settings
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
