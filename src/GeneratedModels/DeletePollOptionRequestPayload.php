<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for deleting the single poll option a review item was raised for. Deletion is permanent; the rest of the poll is kept.
 */
class DeletePollOptionRequestPayload extends BaseModel
{
    public function __construct(
        public ?string $reason = null, // Reason for deletion
        public ?string $optionID = null, // Option to delete. Required on an item for a whole poll (create or edit); defaults to the option an add_option / update_option item was raised for
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
