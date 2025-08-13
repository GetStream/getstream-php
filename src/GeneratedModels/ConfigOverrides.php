<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ConfigOverrides implements JsonSerializable
{
    public function __construct(public ?array $commands = null,
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
        public ?bool $userMessageReminders = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'commands' => $this->commands,
            'grants' => $this->grants,
            'blocklist' => $this->blocklist,
            'blocklist_behavior' => $this->blocklistBehavior,
            'max_message_length' => $this->maxMessageLength,
            'quotes' => $this->quotes,
            'reactions' => $this->reactions,
            'replies' => $this->replies,
            'shared_locations' => $this->sharedLocations,
            'typing_events' => $this->typingEvents,
            'uploads' => $this->uploads,
            'url_enrichment' => $this->urlEnrichment,
            'user_message_reminders' => $this->userMessageReminders,
        ], fn($v) => $v !== null);
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }

    /**
     * Create a new instance from JSON data.
     *
     * @param array<string, mixed>|string $json JSON data
     * @return static
     */
    public static function fromJson($json): self
    {
        if (is_string($json)) {
            $json = json_decode($json, true);
        }
        
        return new static(commands: $json['commands'] ?? null,
            grants: $json['grants'] ?? null,
            blocklist: $json['blocklist'] ?? null,
            blocklistBehavior: $json['blocklist_behavior'] ?? null,
            maxMessageLength: $json['max_message_length'] ?? null,
            quotes: $json['quotes'] ?? null,
            reactions: $json['reactions'] ?? null,
            replies: $json['replies'] ?? null,
            sharedLocations: $json['shared_locations'] ?? null,
            typingEvents: $json['typing_events'] ?? null,
            uploads: $json['uploads'] ?? null,
            urlEnrichment: $json['url_enrichment'] ?? null,
            userMessageReminders: $json['user_message_reminders'] ?? null
        );
    }
} 
