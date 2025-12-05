<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $automod
 * @property string $automodBehavior
 * @property int $maxMessageLength
 * @property string|null $blocklist
 * @property string|null $blocklistBehavior
 * @property bool|null $connectEvents
 * @property bool|null $countMessages
 * @property bool|null $customEvents
 * @property bool|null $deliveryEvents
 * @property bool|null $markMessagesPending
 * @property bool|null $mutes
 * @property int|null $partitionSize
 * @property string|null $partitionTtl
 * @property bool|null $polls
 * @property bool|null $pushNotifications
 * @property bool|null $quotes
 * @property bool|null $reactions
 * @property bool|null $readEvents
 * @property bool|null $reminders
 * @property bool|null $replies
 * @property bool|null $search
 * @property bool|null $sharedLocations
 * @property bool|null $skipLastMsgUpdateForSystemMsgs
 * @property bool|null $typingEvents
 * @property bool|null $uploads
 * @property bool|null $urlEnrichment
 * @property bool|null $userMessageReminders
 * @property array|null $allowedFlagReasons
 * @property array<BlockListOptions>|null $blocklists
 * @property array|null $commands
 * @property array<PolicyRequest>|null $permissions
 * @property Thresholds|null $automodThresholds
 * @property array|null $grants
 */
class UpdateChannelTypeRequest extends BaseModel
{
    public function __construct(
        public ?string $automod = null,
        public ?string $automodBehavior = null,
        public ?int $maxMessageLength = null,
        public ?string $blocklist = null,
        public ?string $blocklistBehavior = null,
        public ?bool $connectEvents = null,
        public ?bool $countMessages = null,
        public ?bool $customEvents = null,
        public ?bool $deliveryEvents = null,
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
        /** @var array<BlockListOptions>|null */
        #[ArrayOf(BlockListOptions::class)]
        public ?array $blocklists = null,
        public ?array $commands = null, // List of commands that channel supports
        /** @var array<PolicyRequest>|null */
        #[ArrayOf(PolicyRequest::class)]
        public ?array $permissions = null,
        public ?Thresholds $automodThresholds = null,
        public ?array $grants = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
