<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Channel configuration overrides
 */
class ChannelConfigOverrides extends BaseModel
{
    public function __construct(
        public ?bool $typingEvents = null, // Enables or disables typing events
        public ?bool $reactions = null, // Enables or disables reactions
        public ?bool $replies = null, // Enables message replies (threads)
        public ?bool $quotes = null, // Enables message quotes
        public ?bool $uploads = null, // Enables or disables file uploads
        public ?bool $urlEnrichment = null, // Enables or disables URL enrichment
        public ?int $maxMessageLength = null, // Overrides max message length
        public ?string $blocklist = null,
        public ?string $blocklistBehavior = null,
        public ?array $grants = null,
        public ?array $commands = null, // List of commands that channel supports
        public ?string $pushLevel = null, // Overrides the push notification level for this channel
        public ?ChatPreferences $chatPreferences = null,
        public ?bool $userMessageReminders = null, // Enable/disable user message reminders
        public ?bool $sharedLocations = null, // Enable/disable shared locations
        public ?bool $countMessages = null, // Enable/disable message counting
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
