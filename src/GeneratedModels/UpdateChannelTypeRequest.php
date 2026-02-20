<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateChannelTypeRequest extends BaseModel
{
    public function __construct(
        /** @var array<PolicyRequest>|null */
        #[ArrayOf(PolicyRequest::class)]
        public ?array $permissions = null,
        public ?array $grants = null,
        public ?int $partitionSize = null,
        public ?string $partitionTtl = null,
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
        public ?int $maxMessageLength = null,
        public ?string $automod = null,
        public ?string $automodBehavior = null,
        public ?string $blocklist = null,
        public ?string $blocklistBehavior = null,
        /** @var array<BlockListOptions>|null */
        #[ArrayOf(BlockListOptions::class)]
        public ?array $blocklists = null,
        public ?array $allowedFlagReasons = null,
        public ?Thresholds $automodThresholds = null,
        public ?bool $skipLastMsgUpdateForSystemMsgs = null,
        public ?string $pushLevel = null,
        public ?array $commands = null, // List of commands that channel supports
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
