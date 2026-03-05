<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CheckS3AccessRequest extends BaseModel
{
    public function __construct(
        public ?string $s3Url = null, // Optional stream+s3:// reference to test access against
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
