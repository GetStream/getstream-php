<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * SIP trunk information
 */
class SIPTrunkResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Unique identifier for the SIP trunk
        public ?string $name = null, // Name of the SIP trunk
        public ?array $numbers = null, // Phone numbers associated with this SIP trunk
        public ?string $uri = null, // The URI for the SIP trunk
        public ?string $username = null, // Username for SIP trunk authentication
        public ?string $password = null, // Password for SIP trunk authentication
        public ?\DateTime $createdAt = null, // Creation timestamp
        public ?\DateTime $updatedAt = null, // Last update timestamp
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
