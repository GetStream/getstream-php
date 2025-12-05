<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $externalAppUrl
 * @property string $externalCssUrl
 * @property string $name
 * @property bool|null $detectOrientation
 * @property object|null $options
 */
class LayoutSettings extends BaseModel
{
    public function __construct(
        public ?string $externalAppUrl = null,
        public ?string $externalCssUrl = null,
        public ?string $name = null,
        public ?bool $detectOrientation = null,
        public ?object $options = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
