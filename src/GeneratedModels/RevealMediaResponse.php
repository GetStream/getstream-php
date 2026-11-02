<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response after a reveal of a review queue item's media is allowed
 */
class RevealMediaResponse extends BaseModel
{
    public function __construct(
        public ?MediaDisplayResponse $mediaDisplay = null, // Display policy for a review queue item's images and video
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
