<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Block list contains restricted words
 */
class CreateBlockListRequest extends BaseModel
{
    public function __construct(
        public ?bool $isLeetCheckEnabled = null,
        public ?bool $isPluralCheckEnabled = null,
        public ?string $name = null, // Block list name
        public ?array $words = null, // List of words to block
        public ?string $type = null, // Block list type. One of: regex, domain, domain_allowlist, email, email_allowlist, word
        public ?string $team = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
