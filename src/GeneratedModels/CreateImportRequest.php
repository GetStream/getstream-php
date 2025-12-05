<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $mode
 * @property string $path
 */
class CreateImportRequest extends BaseModel
{
    public function __construct(
        public ?string $mode = null,
        public ?string $path = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
