<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SIPChallenge extends BaseModel
{
    public function __construct(
        public ?string $a1 = null,
        public ?string $algorithm = null,
        public ?string $charset = null,
        public ?string $cnonce = null,
        public ?string $method = null,
        public ?string $nc = null,
        public ?string $nonce = null,
        public ?string $opaque = null,
        public ?string $realm = null,
        public ?string $response = null,
        public ?bool $stale = null,
        public ?string $uri = null,
        public ?bool $userhash = null,
        public ?string $username = null,
        public ?array $domain = null,
        public ?array $qop = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
