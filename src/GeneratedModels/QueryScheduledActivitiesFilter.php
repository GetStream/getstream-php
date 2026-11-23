<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryScheduledActivitiesFilter extends BaseModel
{
    public function __construct(
        public ?string $userID = null, // Only activities of this user. Server-side only; client-side requests always see their own.
        public ?string $fid = null, // Only activities scheduled for this feed
        public ?array $status = null, // Only activities with one of these statuses: scheduled, publishing, failed
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
