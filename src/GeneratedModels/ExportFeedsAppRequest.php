<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request for exporting all feeds data of the app
 */
class ExportFeedsAppRequest extends BaseModel
{
    public function __construct(
        public ?array $types = null, // Only export these item types, e.g. activity or comment; each one of the export layout item types, without duplicates. poll and poll_vote require activity. Empty exports everything
        public ?bool $includeDeleted = null, // Whether soft-deleted activities and comments are exported. Defaults to true
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
