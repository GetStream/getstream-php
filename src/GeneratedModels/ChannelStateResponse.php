<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ChannelStateResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?array $members = null,
        public ?array $messages = null,
        public ?array $pinnedMessages = null,
        public ?array $threads = null,
        public ?bool $hidden = null,
        public ?\DateTime $hideMessagesBefore = null,
        public ?int $watcherCount = null,
        public ?array $activeLiveLocations = null,
        public ?array $pendingMessages = null,
        public ?array $read = null,
        public ?array $watchers = null,
        public ?ChannelResponse $channel = null,
        public ?DraftResponse $draft = null,
        public ?ChannelMember $membership = null,
        public ?ChannelPushPreferences $pushPreferences = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'members' => $this->members,
            'messages' => $this->messages,
            'pinned_messages' => $this->pinnedMessages,
            'threads' => $this->threads,
            'hidden' => $this->hidden,
            'hide_messages_before' => $this->hideMessagesBefore,
            'watcher_count' => $this->watcherCount,
            'active_live_locations' => $this->activeLiveLocations,
            'pending_messages' => $this->pendingMessages,
            'read' => $this->read,
            'watchers' => $this->watchers,
            'channel' => $this->channel,
            'draft' => $this->draft,
            'membership' => $this->membership,
            'push_preferences' => $this->pushPreferences,
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
        
        return new static(duration: $json['duration'] ?? null,
            members: $json['members'] ?? null,
            messages: $json['messages'] ?? null,
            pinnedMessages: $json['pinned_messages'] ?? null,
            threads: $json['threads'] ?? null,
            hidden: $json['hidden'] ?? null,
            hideMessagesBefore: $json['hide_messages_before'] ?? null,
            watcherCount: $json['watcher_count'] ?? null,
            activeLiveLocations: $json['active_live_locations'] ?? null,
            pendingMessages: $json['pending_messages'] ?? null,
            read: $json['read'] ?? null,
            watchers: $json['watchers'] ?? null,
            channel: $json['channel'] ?? null,
            draft: $json['draft'] ?? null,
            membership: $json['membership'] ?? null,
            pushPreferences: $json['push_preferences'] ?? null
        );
    }
} 
