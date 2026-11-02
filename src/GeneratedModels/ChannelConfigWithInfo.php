<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelConfigWithInfo extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?string $name = null,
        public ?bool $typingEvents = null,
        public ?bool $readEvents = null,
        public ?bool $connectEvents = null,
        public ?bool $deliveryEvents = null,
        public ?bool $search = null,
        public ?bool $reactions = null,
        public ?bool $replies = null,
        public ?bool $quotes = null,
        public ?bool $mutes = null,
        public ?bool $uploads = null,
        public ?bool $urlEnrichment = null,
        public ?bool $customEvents = null,
        public ?bool $pushNotifications = null,
        public ?bool $reminders = null,
        public ?bool $markMessagesPending = null,
        public ?bool $polls = null,
        public ?bool $userMessageReminders = null,
        public ?bool $sharedLocations = null,
        public ?bool $countMessages = null,
        public ?string $messageRetention = null,
        public ?int $maxMessageLength = null,
        public ?string $automod = null, // Automod level applied to a channel type.
        public ?string $automodBehavior = null, // What automod or a blocklist does when it matches.
        public ?string $blocklist = null,
        public ?string $blocklistBehavior = null, // What automod or a blocklist does when it matches.
        /** @var array<BlockListOptions>|null */
        #[ArrayOf(BlockListOptions::class)]
        public ?array $blocklists = null,
        public ?array $allowedFlagReasons = null,
        public ?Thresholds $automodThresholds = null, // Sets thresholds for AI moderation
        public ?int $partitionSize = null,
        public ?string $partitionTtl = null,
        public ?bool $skipLastMsgUpdateForSystemMsgs = null,
        public ?string $pushLevel = null, // Sets the push notification level for a channel type
        public ?ChatPreferences $chatPreferences = null,
        /** @var array<Command>|null */
        #[ArrayOf(Command::class)]
        public ?array $commands = null,
        public ?array $grants = null,
        public ?int $scheduledMessagesMaxPerChannel = null, // Maximum number of scheduled messages (scheduled or sending) a user can have in this channel. Present only when scheduled messages are enabled for the app. Scheduling more returns error code 117 (scheduled_limit_channel)
        public ?int $scheduledMessagesMaxLeadTimeSeconds = null, // How far ahead, in seconds, a message can be scheduled. Present only when scheduled messages are enabled for the app. A later scheduled_at returns error code 116 (scheduled_at_too_far), whose max_lead_time_seconds carries the same value
        public ?int $scheduledMessagesMinLeadTimeSeconds = null, // Minimum time ahead, in seconds, a message is scheduled for. Present only when scheduled messages are enabled for the app. A future scheduled_at closer than this is moved later, to the first whole minute at least this far ahead; it is never rejected
        public ?int $scheduledMessagesMaxPerUser = null, // Maximum number of scheduled messages (scheduled or sending) a user can have across all channels. Present only when scheduled messages are enabled for the app. Scheduling more returns error code 118 (scheduled_limit_user)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
