<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * SIP call configuration response
 *
 * @property object $customData
 */
class SIPCallConfigsResponse extends BaseModel
{
    public function __construct(
        public ?object $customData = null, // Custom data associated with the call
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
