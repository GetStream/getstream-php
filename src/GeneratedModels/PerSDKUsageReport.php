<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $total
 * @property array $byVersion
 */
class PerSDKUsageReport extends BaseModel
{
    public function __construct(
        public ?int $total = null,
        public ?array $byVersion = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
