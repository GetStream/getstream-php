<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpsertExternalStorageRequest extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?UpsertExternalStorageAWSS3Request $awsS3 = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
