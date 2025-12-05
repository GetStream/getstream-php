<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $automod
 * @property string $automodBehavior
 * @property int $maxMessageLength
 * @property string $name
 * @property string|null $blocklist
 * @property string|null $blocklistBehavior
 * @property bool|null $connectEvents
 * @property bool|null $countMessages
 * @property bool|null $customEvents
 * @property bool|null $deliveryEvents
 * @property bool|null $markMessagesPending
 * @property string|null $messageRetention
 * @property bool|null $mutes
 * @property int|null $partitionSize
 * @property string|null $partitionTtl
 * @property bool|null $polls
 * @property bool|null $pushNotifications
 * @property bool|null $reactions
 * @property bool|null $readEvents
 * @property bool|null $replies
 * @property bool|null $search
 * @property bool|null $sharedLocations
 * @property bool|null $skipLastMsgUpdateForSystemMsgs
 * @property bool|null $typingEvents
 * @property bool|null $uploads
 * @property bool|null $urlEnrichment
 * @property bool|null $userMessageReminders
 * @property array<BlockListOptions>|null $blocklists
 * @property array|null $commands
 * @property array<PolicyRequest>|null $permissions
 * @property array|null $grants
 */
class CreateChannelTypeRequest extends BaseModel
{
    public function __construct(
        public ?string $automod = null, // Automod
        public ?string $automodBehavior = null, // Automod behavior
        public ?int $maxMessageLength = null, // Max message length
        public ?string $name = null, // Channel type name
        public ?string $blocklist = null, // Blocklist
        public ?string $blocklistBehavior = null, // Blocklist behavior
        public ?bool $connectEvents = null, // Connect events
        public ?bool $countMessages = null, // Count messages in channel.
        public ?bool $customEvents = null, // Custom events
        public ?bool $deliveryEvents = null,
        public ?bool $markMessagesPending = null, // Mark messages pending
        public ?string $messageRetention = null, // Message retention
        public ?bool $mutes = null, // Mutes
        public ?int $partitionSize = null, // Partition size
        public ?string $partitionTtl = null, // Partition TTL
        public ?bool $polls = null, // Polls
        public ?bool $pushNotifications = null, // Push notifications
        public ?bool $reactions = null, // Reactions
        public ?bool $readEvents = null, // Read events
        public ?bool $replies = null, // Replies
        public ?bool $search = null, // Search
        public ?bool $sharedLocations = null, // Enables shared location messages
        public ?bool $skipLastMsgUpdateForSystemMsgs = null,
        public ?bool $typingEvents = null, // Typing events
        public ?bool $uploads = null, // Uploads
        public ?bool $urlEnrichment = null, // URL enrichment
        public ?bool $userMessageReminders = null,
        /** @var array<BlockListOptions>|null Blocklists */
        #[ArrayOf(BlockListOptions::class)]
        public ?array $blocklists = null, // Blocklists
        public ?array $commands = null, // List of commands that channel supports
        /** @var array<PolicyRequest>|null List of permissions for the channel type */
        #[ArrayOf(PolicyRequest::class)]
        public ?array $permissions = null, // List of permissions for the channel type
        public ?array $grants = null, // List of grants for the channel type
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
