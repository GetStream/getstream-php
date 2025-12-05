<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $enabled
 * @property string|null $packageName
 * @property string|null $secret
 */
class XiaomiConfigFields extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?string $packageName = null,
        public ?string $secret = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
