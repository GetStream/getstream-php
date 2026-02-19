<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for ban moderation action
 */
class BanActionRequestPayload extends BaseModel
{
    public function __construct(
        public ?string $targetUserID = null, // Optional: ban user directly without review item
        public ?bool $shadow = null, // Whether this is a shadow ban
        public ?string $reason = null, // Reason for the ban
        public ?bool $channelBanOnly = null, // Ban only from specific channel
        public ?bool $ipBan = null, // Whether to ban by IP address
        public ?string $deleteMessages = null, // Message deletion mode: soft, pruning, or hard
        public ?int $timeout = null, // Duration of ban in minutes
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
