<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ImportV2TaskSettingsS3 extends BaseModel
{
    public function __construct(
        public ?string $region = null,
        public ?string $bucket = null,
        public ?string $dir = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
