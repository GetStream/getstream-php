<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Ban information
 */
class BanInfoResponse extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null, // User response object
        public ?string $channelCid = null, // The channel this ban applies to. Empty if this is an app-wide (global) ban rather than a per-channel ban.
        public ?ChannelMetadata $channel = null,
        public ?\DateTime $expires = null, // When the ban expires
        public ?string $reason = null, // Reason for the ban
        public ?bool $shadow = null, // Whether this is a shadow ban
        public ?UserResponse $createdBy = null, // User response object
        public ?\DateTime $createdAt = null, // When the ban was created
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
