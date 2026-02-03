<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property AppealItemResponse|null $appealItem
 * @property ReviewQueueItemResponse|null $item
 */
class SubmitActionResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?AppealItemResponse $appealItem = null,
        public ?ReviewQueueItemResponse $item = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
