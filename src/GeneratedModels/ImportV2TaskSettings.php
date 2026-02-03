<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $mode
 * @property string|null $path
 * @property bool|null $skipReferencesCheck
 * @property ImportV2TaskSettingsS3|null $s3
 */
class ImportV2TaskSettings extends BaseModel
{
    public function __construct(
        public ?string $mode = null,
        public ?string $path = null,
        public ?bool $skipReferencesCheck = null,
        public ?ImportV2TaskSettingsS3 $s3 = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
