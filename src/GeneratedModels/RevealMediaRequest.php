<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request to reveal a review queue item's blurred media
 */
class RevealMediaRequest extends BaseModel
{
    public function __construct(
        public ?string $itemID = null, // ID of the review queue item whose media is revealed
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
