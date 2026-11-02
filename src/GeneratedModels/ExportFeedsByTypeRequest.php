<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request for exporting one type of feeds data
 */
class ExportFeedsByTypeRequest extends BaseModel
{
    public function __construct(
        public ?string $userID = null, // Only export rows of this user: activities, comments and reactions by the user; follows where the user created the source or the target feed. With user_id, soft-deleted activities and comments are left out
        public ?\DateTime $createdAtFrom = null, // Only export rows created at or after this time. On reactions and follows it requires user_id; on comments soft-deleted rows are left out
        public ?\DateTime $createdAtTo = null, // Only export rows created before this time. On reactions and follows it requires user_id; on comments soft-deleted rows are left out
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
