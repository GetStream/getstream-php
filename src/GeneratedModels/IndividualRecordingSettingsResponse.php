<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IndividualRecordingSettingsResponse extends BaseModel
{
    public function __construct(
        public ?string $mode = null, // Whether a call feature is available, disabled, or turned on automatically.
        public ?array $outputTypes = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
