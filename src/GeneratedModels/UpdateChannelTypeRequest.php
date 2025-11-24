<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
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
        public ?array $blocklists = null,
        public ?array $commands = null,    // List of commands that channel supports 
        public ?array $permissions = null,
        public ?Thresholds $automodThresholds = null,
        public ?array $grants = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
