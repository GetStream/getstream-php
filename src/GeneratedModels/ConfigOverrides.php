<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ConfigOverrides extends BaseModel
{
    public function __construct(
        public ?array $commands = null,
        public ?array $grants = null,
        public ?string $blocklist = null,
        public ?string $blocklistBehavior = null,
        public ?int $maxMessageLength = null,
        public ?bool $quotes = null,
        public ?bool $reactions = null,
        public ?bool $replies = null,
        public ?bool $sharedLocations = null,
        public ?bool $typingEvents = null,
        public ?bool $uploads = null,
        public ?bool $urlEnrichment = null,
        public ?bool $userMessageReminders = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
