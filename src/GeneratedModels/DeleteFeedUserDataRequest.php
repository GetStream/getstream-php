<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request for deleting feed user data
 *
 * @property bool|null $hardDelete
 */
class DeleteFeedUserDataRequest extends BaseModel
{
    public function __construct(
        public ?bool $hardDelete = null, // Whether to perform a hard delete instead of a soft delete
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
