<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedsPreferencesResponse extends BaseModel
{
    public function __construct(
        public ?string $follow = null,
        public ?string $comment = null,
        public ?string $reaction = null,
        public ?string $commentReaction = null,
        public ?string $commentReply = null,
        public ?string $mention = null,
        public ?array $customActivityTypes = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
