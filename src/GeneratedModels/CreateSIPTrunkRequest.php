<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request to create a new SIP trunk
 */
class CreateSIPTrunkRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null, // Name of the SIP trunk
        public ?array $numbers = null, // Phone numbers associated with this SIP trunk
        public ?string $password = null, // Optional password for SIP trunk authentication
        public ?array $allowedIps = null, // Optional list of allowed IPv4/IPv6 addresses or CIDR blocks
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
