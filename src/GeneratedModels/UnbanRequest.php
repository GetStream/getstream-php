<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $unbannedByID
 * @property UserRequest|null $unbannedBy
 */
class UnbanRequest extends BaseModel
{
    public function __construct(
        public ?string $unbannedByID = null, // ID of the user performing the unban
        public ?UserRequest $unbannedBy = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
