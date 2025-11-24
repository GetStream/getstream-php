<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Credentials for SIP inbound call authentication
 */
class SipInboundCredentials extends BaseModel
{
    public function __construct(
        public ?string $callID = null,    // ID of the call 
        public ?string $callType = null,    // Type of the call 
        public ?string $token = null,    // Authentication token for the call 
        public ?string $userID = null,    // User ID for the call 
        public ?object $callCustomData = null,    // Custom data associated with the call 
        public ?object $userCustomData = null,    // Custom data associated with the user 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
