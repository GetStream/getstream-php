<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response for DeleteRecording
 *
 * @property string $duration
 */
class DeleteRecordingResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
