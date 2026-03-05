<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Block list contains restricted words
 */
class BlockListResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        public ?string $id = null,
        public ?string $name = null, // Block list name
        public ?string $type = null, // Block list type. One of: regex, domain, domain_allowlist, email, email_allowlist, word
        public ?array $words = null, // List of words to block
        public ?string $team = null,
        public ?bool $isLeetCheckEnabled = null,
        public ?bool $isPluralCheckEnabled = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
