<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 *
 * @property string $duration
 * @property BlockListResponse|null $blocklist
 */
class UpdateBlockListResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?BlockListResponse $blocklist = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
