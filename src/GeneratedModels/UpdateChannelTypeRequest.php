<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateChannelTypeRequest implements JsonSerializable
{
    public function __construct(public ?string $automod = null,
        public ?string $automodBehavior = null,
        public ?int $maxMessageLength = null,
        public ?string $blocklist = null,
        public ?string $blocklistBehavior = null,
        public ?bool $connectEvents = null,
        public ?bool $customEvents = null,
        public ?bool $markMessagesPending = null,
        public ?bool $mutes = null,
        public ?int $partitionSize = null,
        public ?string $partitionTtl = null,
        public ?bool $polls = null,
        public ?bool $pushNotifications = null,
        public ?bool $quotes = null,
        public ?bool $reactions = null,
        public ?bool $readEvents = null,
        public ?bool $reminders = null,
        public ?bool $replies = null,
        public ?bool $search = null,
        public ?bool $sharedLocations = null,
        public ?bool $skipLastMsgUpdateForSystemMsgs = null,
        public ?bool $typingEvents = null,
        public ?bool $uploads = null,
        public ?bool $urlEnrichment = null,
        public ?bool $userMessageReminders = null,
        public ?array $allowedFlagReasons = null,
        public ?array $blocklists = null,
        public ?array $commands = null,
        public ?array $permissions = null,
        public ?Thresholds $automodThresholds = null,
        public ?array $grants = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'automod' => $this->automod,
            'automod_behavior' => $this->automodBehavior,
            'max_message_length' => $this->maxMessageLength,
            'blocklist' => $this->blocklist,
            'blocklist_behavior' => $this->blocklistBehavior,
            'connect_events' => $this->connectEvents,
            'custom_events' => $this->customEvents,
            'mark_messages_pending' => $this->markMessagesPending,
            'mutes' => $this->mutes,
            'partition_size' => $this->partitionSize,
            'partition_ttl' => $this->partitionTtl,
            'polls' => $this->polls,
            'push_notifications' => $this->pushNotifications,
            'quotes' => $this->quotes,
            'reactions' => $this->reactions,
            'read_events' => $this->readEvents,
            'reminders' => $this->reminders,
            'replies' => $this->replies,
            'search' => $this->search,
            'shared_locations' => $this->sharedLocations,
            'skip_last_msg_update_for_system_msgs' => $this->skipLastMsgUpdateForSystemMsgs,
            'typing_events' => $this->typingEvents,
            'uploads' => $this->uploads,
            'url_enrichment' => $this->urlEnrichment,
            'user_message_reminders' => $this->userMessageReminders,
            'allowed_flag_reasons' => $this->allowedFlagReasons,
            'blocklists' => $this->blocklists,
            'commands' => $this->commands,
            'permissions' => $this->permissions,
            'automod_thresholds' => $this->automodThresholds,
            'grants' => $this->grants,
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
        
        return new static(automod: $json['automod'] ?? null,
            automodBehavior: $json['automod_behavior'] ?? null,
            maxMessageLength: $json['max_message_length'] ?? null,
            blocklist: $json['blocklist'] ?? null,
            blocklistBehavior: $json['blocklist_behavior'] ?? null,
            connectEvents: $json['connect_events'] ?? null,
            customEvents: $json['custom_events'] ?? null,
            markMessagesPending: $json['mark_messages_pending'] ?? null,
            mutes: $json['mutes'] ?? null,
            partitionSize: $json['partition_size'] ?? null,
            partitionTtl: $json['partition_ttl'] ?? null,
            polls: $json['polls'] ?? null,
            pushNotifications: $json['push_notifications'] ?? null,
            quotes: $json['quotes'] ?? null,
            reactions: $json['reactions'] ?? null,
            readEvents: $json['read_events'] ?? null,
            reminders: $json['reminders'] ?? null,
            replies: $json['replies'] ?? null,
            search: $json['search'] ?? null,
            sharedLocations: $json['shared_locations'] ?? null,
            skipLastMsgUpdateForSystemMsgs: $json['skip_last_msg_update_for_system_msgs'] ?? null,
            typingEvents: $json['typing_events'] ?? null,
            uploads: $json['uploads'] ?? null,
            urlEnrichment: $json['url_enrichment'] ?? null,
            userMessageReminders: $json['user_message_reminders'] ?? null,
            allowedFlagReasons: $json['allowed_flag_reasons'] ?? null,
            blocklists: $json['blocklists'] ?? null,
            commands: $json['commands'] ?? null,
            permissions: $json['permissions'] ?? null,
            automodThresholds: $json['automod_thresholds'] ?? null,
            grants: $json['grants'] ?? null
        );
    }
} 
