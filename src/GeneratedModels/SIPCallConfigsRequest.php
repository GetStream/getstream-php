<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for SIP call settings
 *
 * @property object|null $customData
 */
class SIPCallConfigsRequest extends BaseModel
{
    public function __construct(
        public ?object $customData = null, // Custom data associated with the call
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
