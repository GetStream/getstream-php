<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Response for deleting feed user data
 */
class DeleteFeedUserDataResponse extends BaseModel
{
    public function __construct(
        public ?int $deletedActivities = null,    // Number of activities that were deleted 
        public ?int $deletedBookmarks = null,    // Number of bookmarks that were deleted 
        public ?int $deletedComments = null,    // Number of comments that were deleted 
        public ?int $deletedReactions = null,    // Number of reactions that were deleted 
        public ?string $duration = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
