<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response containing the pre-authentication decision for a SIP trunk
 */
class ResolveSipAuthResponse extends BaseModel
{
    public function __construct(
        public ?string $authResult = null, // Authentication result: password, accept, or no_trunk_found
        public ?string $username = null, // Username for digest authentication (when auth_result is password)
        public ?string $password = null, // Password for digest authentication (when auth_result is password)
        public ?string $trunkID = null, // ID of the matched SIP trunk
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
