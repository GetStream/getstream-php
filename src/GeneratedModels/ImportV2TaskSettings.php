<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ImportV2TaskSettings extends BaseModel
{
    public function __construct(
        public ?ImportV2TaskSettingsS3 $s3 = null,
        public ?string $source = null,
        public ?string $mode = null,
        public ?string $path = null,
        public ?bool $skipReferencesCheck = null,
        public ?bool $mergeCustom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
