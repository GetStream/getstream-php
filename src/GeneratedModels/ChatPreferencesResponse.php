<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChatPreferencesResponse extends BaseModel
{
    public function __construct(
        public ?string $defaultPreference = null,
        public ?string $directMentions = null,
        public ?string $roleMentions = null,
        public ?string $groupMentions = null,
        public ?string $threadReplies = null,
        public ?string $hereMentions = null,
        public ?string $channelMentions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
