<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CreateChannelTypeRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null, // Channel type name
        public ?bool $typingEvents = null, // Typing events
        public ?bool $readEvents = null, // Read events
        public ?bool $connectEvents = null, // Connect events
        public ?bool $deliveryEvents = null,
        public ?bool $reactions = null, // Reactions
        public ?bool $replies = null, // Replies
        public ?bool $search = null, // Search
        public ?bool $mutes = null, // Mutes
        public ?bool $uploads = null, // Uploads
        public ?bool $urlEnrichment = null, // URL enrichment
        public ?bool $customEvents = null, // Custom events
        public ?bool $pushNotifications = null, // Push notifications
        public ?bool $markMessagesPending = null, // Mark messages pending
        public ?bool $polls = null, // Polls
        public ?bool $userMessageReminders = null,
        public ?bool $sharedLocations = null, // Enables shared location messages
        public ?bool $countMessages = null, // Count messages in channel.
        public ?string $messageRetention = null, // Message retention. One of: infinite, numeric
        public ?int $maxMessageLength = null, // Max message length
        public ?string $automod = null, // Automod. One of: disabled, simple, AI
        public ?string $automodBehavior = null, // Automod behavior. One of: flag, block
        public ?array $commands = null, // List of commands that channel supports
        /** @var array<PolicyRequest>|null */
        #[ArrayOf(PolicyRequest::class)]
        public ?array $permissions = null, // List of permissions for the channel type
        public ?array $grants = null, // List of grants for the channel type
        public ?string $blocklist = null, // Blocklist
        public ?string $blocklistBehavior = null, // Blocklist behavior. One of: flag, block, shadow_block
        /** @var array<BlockListOptions>|null */
        #[ArrayOf(BlockListOptions::class)]
        public ?array $blocklists = null, // Blocklists
        public ?int $partitionSize = null, // Partition size
        public ?string $partitionTtl = null, // Partition TTL
        public ?bool $skipLastMsgUpdateForSystemMsgs = null,
        public ?string $pushLevel = null, // Default push notification level for the channel type. One of: all, all_mentions, mentions, direct_mentions, none
        public ?ChatPreferences $chatPreferences = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
