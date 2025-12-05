<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $name
 * @property bool|null $detectOrientation
 * @property string|null $externalAppUrl
 * @property string|null $externalCssUrl
 * @property object|null $options
 */
class LayoutSettingsRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?bool $detectOrientation = null,
        public ?string $externalAppUrl = null,
        public ?string $externalCssUrl = null,
        public ?object $options = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
