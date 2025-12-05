<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $datacenter
 * @property string $id
 * @property Coordinates $coordinates
 * @property Location $location
 * @property int|null $count
 */
class SFULocationResponse extends BaseModel
{
    public function __construct(
        public ?string $datacenter = null,
        public ?string $id = null,
        public ?Coordinates $coordinates = null,
        public ?Location $location = null,
        public ?int $count = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
