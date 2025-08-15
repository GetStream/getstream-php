<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Response for exporting feed user data
 */
class ExportFeedUserDataResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?string $taskID = null,    // The task ID for the export task 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
