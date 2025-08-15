<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Request for updating a call
 */
class UpdateCallRequest extends BaseModel
{
    public function __construct(
        public ?\DateTime $startsAt = null,    // the time the call is scheduled to start 
        public ?object $custom = null,    // Custom data for this object 
        public ?CallSettingsRequest $settingsOverride = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
