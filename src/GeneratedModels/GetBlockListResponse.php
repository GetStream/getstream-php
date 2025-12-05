<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response for get block list
 *
 * @property string $duration
 * @property BlockListResponse|null $blocklist
 */
class GetBlockListResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?BlockListResponse $blocklist = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
