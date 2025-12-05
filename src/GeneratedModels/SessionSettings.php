<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $inactivityTimeoutSeconds
 */
class SessionSettings extends BaseModel
{
    public function __construct(
        public ?int $inactivityTimeoutSeconds = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
