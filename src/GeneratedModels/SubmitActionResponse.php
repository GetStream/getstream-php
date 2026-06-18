<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SubmitActionResponse extends BaseModel
{
    public function __construct(
        public ?ReviewQueueItemResponse $item = null,
        public ?AppealItemResponse $appealItem = null,
        public ?string $autoRestoreWarning = null, // Present when the appeal was accepted but the entity could not be restored automatically. The moderator should restore it manually.
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
