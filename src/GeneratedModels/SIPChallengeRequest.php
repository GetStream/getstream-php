<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * SIP digest challenge authentication data
 */
class SIPChallengeRequest extends BaseModel
{
    public function __construct(
        public ?string $username = null, // Username for authentication
        public ?string $realm = null, // Authentication realm
        public ?array $domain = null, // Domain list
        public ?string $nonce = null, // Server nonce
        public ?string $opaque = null, // Opaque value
        public ?bool $stale = null, // Whether the nonce is stale
        public ?string $algorithm = null, // Hash algorithm (e.g., MD5, SHA-256)
        public ?array $qop = null, // Quality of protection options
        public ?string $charset = null, // Character set
        public ?bool $userhash = null, // Whether to hash the username
        public ?string $a1 = null, // Deprecated: A1 hash for backward compatibility
        public ?string $response = null, // Digest response hash from client
        public ?string $uri = null, // Request URI
        public ?string $method = null, // SIP method (e.g., INVITE)
        public ?string $nc = null, // Nonce count for qop=auth
        public ?string $cnonce = null, // Client nonce for qop=auth
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
