<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CreateSegmentRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null, // The ID of the segment
        public ?string $type = null, // The type of the segment
        public ?string $name = null, // The name of the segment (max 128 characters)
        public ?string $description = null, // The description of the segment (max 256 characters)
        public ?object $filter = null, // Filter to apply to the query
        public ?bool $allUsers = null, // If true, all users are included in the segment
        public ?bool $allSenderChannels = null, // If true, all sender channels are included in the segment
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
