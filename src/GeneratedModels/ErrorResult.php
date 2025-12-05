<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $type
 * @property string|null $stacktrace
 * @property string|null $version
 */
class ErrorResult extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?string $stacktrace = null,
        public ?string $version = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
