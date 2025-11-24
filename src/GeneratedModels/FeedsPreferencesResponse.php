<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedsPreferencesResponse extends BaseModel
{
    public function __construct(
        public ?string $comment = null,
        public ?string $commentReaction = null,
        public ?string $follow = null,
        public ?string $mention = null,
        public ?string $reaction = null,
        public ?array $customActivityTypes = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
