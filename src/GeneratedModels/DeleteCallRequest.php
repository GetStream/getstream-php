<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * DeleteCallRequest is the payload for deleting a call.
 *
 * @property bool|null $hard
 */
class DeleteCallRequest extends BaseModel
{
    public function __construct(
        public ?bool $hard = null, // if true the call will be hard deleted along with all related data
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
