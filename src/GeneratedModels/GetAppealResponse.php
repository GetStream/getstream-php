<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property AppealItemResponse|null $item
 */
class GetAppealResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?AppealItemResponse $item = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
