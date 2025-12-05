<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array $feeds
 * @property bool|null $hardDelete
 */
class DeleteFeedsBatchRequest extends BaseModel
{
    public function __construct(
        public ?array $feeds = null, // List of fully qualified feed IDs (format: group_id:feed_id) to delete
        public ?bool $hardDelete = null, // Whether to permanently delete the feeds instead of soft delete
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
