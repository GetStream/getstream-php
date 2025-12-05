<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $apiKey
 * @property bool|null $enabled
 * @property string|null $site
 */
class DataDogInfo extends BaseModel
{
    public function __construct(
        public ?string $apiKey = null,
        public ?bool $enabled = null,
        public ?string $site = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
