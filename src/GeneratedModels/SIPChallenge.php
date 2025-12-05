<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $a1
 * @property string|null $algorithm
 * @property string|null $charset
 * @property string|null $cnonce
 * @property string|null $method
 * @property string|null $nc
 * @property string|null $nonce
 * @property string|null $opaque
 * @property string|null $realm
 * @property string|null $response
 * @property bool|null $stale
 * @property string|null $uri
 * @property bool|null $userhash
 * @property string|null $username
 * @property array|null $domain
 * @property array|null $qop
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
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
