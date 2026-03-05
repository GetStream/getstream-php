<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * DeleteCallResponse is the payload for deleting a call.
 */
class DeleteCallResponse extends BaseModel
{
    public function __construct(
        public ?CallResponse $call = null,
        public ?string $taskID = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
