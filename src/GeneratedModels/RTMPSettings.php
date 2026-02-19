<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class RTMPSettings extends BaseModel
{
    public function __construct(
        public ?LayoutSettings $layout = null,
        public ?RTMPLocation $location = null,
        public ?bool $enabled = null,
        public ?string $qualityName = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
