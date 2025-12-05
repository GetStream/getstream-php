<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $name
 * @property string|null $description
 * @property string|null $type
 * @property array|null $countryCodes
 */
class GeofenceResponse extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?string $description = null,
        public ?string $type = null,
        public ?array $countryCodes = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
