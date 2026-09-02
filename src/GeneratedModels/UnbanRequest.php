<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UnbanRequest extends BaseModel
{
    public function __construct(
        /** @deprecated */
        public ?string $unbannedByID = null, // ID of the user performing the unban Deprecated: not used by the unban flow
        public ?UserRequest $unbannedBy = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
