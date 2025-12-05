<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $base
 * @property string|null $decay
 * @property string|null $direction
 * @property string|null $offset
 * @property string|null $origin
 * @property string|null $scale
 */
class DecayFunctionConfig extends BaseModel
{
    public function __construct(
        public ?string $base = null, // Base value for decay function
        public ?string $decay = null, // Decay rate
        public ?string $direction = null, // Direction of decay
        public ?string $offset = null, // Offset value for decay function
        public ?string $origin = null, // Origin value for decay function
        public ?string $scale = null, // Scale factor for decay function
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
