<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * DeleteCallResponse is the payload for deleting a call.
 *
 * @property string $duration
 * @property CallResponse $call
 * @property string|null $taskID
 */
class DeleteCallResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?CallResponse $call = null,
        public ?string $taskID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
