<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UnbanRequest extends BaseModel
{
    public function __construct(
        public ?UserRequest $unbannedBy = null,
        public ?string $unbannedByID = null, // ID of the user performing the unban
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
