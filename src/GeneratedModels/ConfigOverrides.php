<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $blocklist
 * @property string|null $blocklistBehavior
 * @property bool|null $countMessages
 * @property int|null $maxMessageLength
 * @property bool|null $quotes
 * @property bool|null $reactions
 * @property bool|null $replies
 * @property bool|null $sharedLocations
 * @property bool|null $typingEvents
 * @property bool|null $uploads
 * @property bool|null $urlEnrichment
 * @property bool|null $userMessageReminders
 * @property array|null $commands
 * @property array|null $grants
 */
class ConfigOverrides extends BaseModel
{
    public function __construct(
        public ?string $blocklist = null,
        public ?string $blocklistBehavior = null,
        public ?bool $countMessages = null,
        public ?int $maxMessageLength = null,
        public ?bool $quotes = null,
        public ?bool $reactions = null,
        public ?bool $replies = null,
        public ?bool $sharedLocations = null,
        public ?bool $typingEvents = null,
        public ?bool $uploads = null,
        public ?bool $urlEnrichment = null,
        public ?bool $userMessageReminders = null,
        public ?array $commands = null,
        public ?array $grants = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
