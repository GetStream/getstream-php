<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $architecture
 * @property string|null $name
 * @property string|null $version
 */
class ClientOSDataResponse extends BaseModel
{
    public function __construct(
        public ?string $architecture = null,
        public ?string $name = null,
        public ?string $version = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
