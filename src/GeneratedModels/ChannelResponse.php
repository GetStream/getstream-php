<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Represents channel in chat
 */
class ChannelResponse extends BaseModel
{
    public function __construct(
        public ?string $cid = null,    // Channel CID (<type>:<id>) 
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?bool $disabled = null,
        public ?bool $frozen = null,    // Whether channel is frozen or not 
        public ?string $id = null,    // Channel unique ID 
        public ?string $type = null,    // Type of the channel 
        public ?\DateTime $updatedAt = null,    // Date/time of the last update 
        public ?object $custom = null,    // Custom data for this object 
        public ?bool $autoTranslationEnabled = null,    // Whether auto translation is enabled or not 
        public ?string $autoTranslationLanguage = null,    // Language to translate to when auto translation is active 
        public ?bool $blocked = null,    // Whether this channel is blocked by current user or not 
        public ?int $cooldown = null,    // Cooldown period after sending each message 
        public ?\DateTime $deletedAt = null,    // Date/time of deletion 
        public ?bool $hidden = null,    // Whether this channel is hidden by current user or not 
        public ?\DateTime $hideMessagesBefore = null,    // Date since when the message history is accessible 
        public ?\DateTime $lastMessageAt = null,    // Date of the last message sent 
        public ?int $memberCount = null,    // Number of members in the channel 
        public ?\DateTime $muteExpiresAt = null,    // Date of mute expiration 
        public ?bool $muted = null,    // Whether this channel is muted or not 
        public ?string $team = null,    // Team the channel belongs to (multi-tenant only) 
        public ?\DateTime $truncatedAt = null,    // Date of the latest truncation of the channel 
        public ?array $members = null,    // List of channel members (max 100) 
        public ?array $ownCapabilities = null,    // List of channel capabilities of authenticated user 
        public ?ChannelConfigWithInfo $config = null,
        public ?UserResponse $createdBy = null,
        public ?UserResponse $truncatedBy = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
