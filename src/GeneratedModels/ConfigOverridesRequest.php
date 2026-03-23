<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Channel configuration overrides
 */
class ConfigOverridesRequest extends BaseModel
{
    public function __construct(
        public ?bool $typingEvents = null, // Enable/disable typing events
        public ?bool $reactions = null, // Enable/disable reactions
        public ?bool $replies = null, // Enable/disable replies
        public ?bool $quotes = null, // Enable/disable quotes
        public ?bool $uploads = null, // Enable/disable uploads
        public ?bool $urlEnrichment = null, // Enable/disable URL enrichment
        public ?int $maxMessageLength = null, // Maximum message length
        public ?string $blocklist = null, // Blocklist name
        public ?string $blocklistBehavior = null, // Blocklist behavior. One of: flag, block
        public ?array $grants = null, // Permission grants modifiers
        public ?array $commands = null, // List of available commands
        public ?bool $userMessageReminders = null, // Enable/disable user message reminders
        public ?bool $sharedLocations = null, // Enable/disable shared locations
        public ?bool $countMessages = null, // Enable/disable message counting
        public ?string $pushLevel = null,
        public ?ChatPreferences $chatPreferences = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
