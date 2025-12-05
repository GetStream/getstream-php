<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $automod
 * @property string $automodBehavior
 * @property bool $connectEvents
 * @property bool $countMessages
 * @property \DateTime $createdAt
 * @property bool $customEvents
 * @property bool $deliveryEvents
 * @property string $duration
 * @property bool $markMessagesPending
 * @property int $maxMessageLength
 * @property bool $mutes
 * @property string $name
 * @property bool $polls
 * @property bool $pushNotifications
 * @property bool $quotes
 * @property bool $reactions
 * @property bool $readEvents
 * @property bool $reminders
 * @property bool $replies
 * @property bool $search
 * @property bool $sharedLocations
 * @property bool $skipLastMsgUpdateForSystemMsgs
 * @property bool $typingEvents
 * @property \DateTime $updatedAt
 * @property bool $uploads
 * @property bool $urlEnrichment
 * @property bool $userMessageReminders
 * @property array $commands
 * @property array<PolicyRequest> $permissions
 * @property array $grants
 * @property string|null $blocklist
 * @property string|null $blocklistBehavior
 * @property int|null $partitionSize
 * @property string|null $partitionTtl
 * @property array|null $allowedFlagReasons
 * @property array<BlockListOptions>|null $blocklists
 * @property Thresholds|null $automodThresholds
 */
class UpdateChannelTypeResponse extends BaseModel
{
    public function __construct(
        public ?string $automod = null,
        public ?string $automodBehavior = null,
        public ?bool $connectEvents = null,
        public ?bool $countMessages = null,
        public ?\DateTime $createdAt = null,
        public ?bool $customEvents = null,
        public ?bool $deliveryEvents = null,
        public ?string $duration = null,
        public ?bool $markMessagesPending = null,
        public ?int $maxMessageLength = null,
        public ?bool $mutes = null,
        public ?string $name = null,
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
        public ?\DateTime $updatedAt = null,
        public ?bool $uploads = null,
        public ?bool $urlEnrichment = null,
        public ?bool $userMessageReminders = null,
        public ?array $commands = null,
        /** @var array<PolicyRequest>|null */
        #[ArrayOf(PolicyRequest::class)]
        public ?array $permissions = null,
        public ?array $grants = null,
        public ?string $blocklist = null,
        public ?string $blocklistBehavior = null,
        public ?int $partitionSize = null,
        public ?string $partitionTtl = null,
        public ?array $allowedFlagReasons = null,
        /** @var array<BlockListOptions>|null */
        #[ArrayOf(BlockListOptions::class)]
        public ?array $blocklists = null,
        public ?Thresholds $automodThresholds = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
