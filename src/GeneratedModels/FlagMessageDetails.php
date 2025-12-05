<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $pinChanged
 * @property bool|null $shouldEnrich
 * @property bool|null $skipPush
 * @property string|null $updatedByID
 */
class FlagMessageDetails extends BaseModel
{
    public function __construct(
        public ?bool $pinChanged = null,
        public ?bool $shouldEnrich = null,
        public ?bool $skipPush = null,
        public ?string $updatedByID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
