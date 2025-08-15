<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class HLSEgressConfig extends BaseModel
{
    public function __construct(
        public ?string $playlistUrl = null,
        public ?int $startUnixNano = null,
        public ?array $qualities = null,
        public ?CompositeAppSettings $compositeAppSettings = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
