<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BulkAppealResult extends BaseModel
{
    public function __construct(
        public ?string $appealID = null,
        public ?AppealItemResponse $appealItem = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
