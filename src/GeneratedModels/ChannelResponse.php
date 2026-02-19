<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Represents channel in chat
 */
class ChannelResponse extends BaseModel
{
    public function __construct(
        public ?ChannelConfigWithInfo $config = null,
        public ?UserResponse $createdBy = null,
        public ?UserResponse $truncatedBy = null,
        public ?string $id = null, // Channel unique ID
        public ?string $type = null, // Type of the channel
        public ?string $cid = null, // Channel CID (<type>:<id>)
        public ?\DateTime $lastMessageAt = null, // Date of the last message sent
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        public ?\DateTime $deletedAt = null, // Date/time of deletion
        public ?bool $frozen = null, // Whether channel is frozen or not
        public ?bool $disabled = null,
        /** @var array<ChannelMemberResponse>|null */
        #[ArrayOf(ChannelMemberResponse::class)]
        public ?array $members = null, // List of channel members (max 100)
        public ?int $memberCount = null, // Number of members in the channel
        public ?bool $muted = null, // Whether this channel is muted or not
        public ?\DateTime $muteExpiresAt = null, // Date of mute expiration
        public ?string $team = null, // Team the channel belongs to (multi-tenant only)
        public ?bool $autoTranslationEnabled = null, // Whether auto translation is enabled or not
        public ?string $autoTranslationLanguage = null, // Language to translate to when auto translation is active
        public ?\DateTime $hideMessagesBefore = null, // Date since when the message history is accessible
        public ?int $cooldown = null, // Cooldown period after sending each message
        /** @var array<ChannelOwnCapability>|null */
        #[ArrayOf(ChannelOwnCapability::class)]
        public ?array $ownCapabilities = null, // List of channel capabilities of authenticated user
        public ?bool $hidden = null, // Whether this channel is hidden by current user or not
        public ?bool $blocked = null, // Whether this channel is blocked by current user or not
        public ?\DateTime $truncatedAt = null, // Date of the latest truncation of the channel
        public ?object $custom = null, // Custom data for this object
        public ?int $messageCount = null, // Number of messages in the channel
        public ?array $filterTags = null, // List of filter tags associated with the channel
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
