<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class VideoReactionResponse extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?UserResponse $user = null,
        public ?string $emojiCode = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
