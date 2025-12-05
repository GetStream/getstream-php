<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $stopClosedCaptions
 */
class StopTranscriptionRequest extends BaseModel
{
    public function __construct(
        public ?bool $stopClosedCaptions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
