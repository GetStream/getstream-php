<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Display policy for a review queue item's images and video
 */
class MediaDisplayResponse extends BaseModel
{
    public function __construct(
        public ?string $mode = null, // Default rendering before a reveal
        public ?bool $revealRestricted = null, // Only users with the RevealProtectedMedia permission may reveal the media (CSAM)
        public ?bool $auditReveal = null, // Reveals must be recorded via the reveal media endpoint (blurred CSAM or gore)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
