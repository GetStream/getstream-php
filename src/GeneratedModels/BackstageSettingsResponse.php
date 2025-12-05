<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $enabled
 * @property int|null $joinAheadTimeSeconds
 */
class BackstageSettingsResponse extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?int $joinAheadTimeSeconds = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
