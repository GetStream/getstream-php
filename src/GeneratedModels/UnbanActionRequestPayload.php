<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for unban moderation action
 */
class UnbanActionRequestPayload extends BaseModel
{
    public function __construct(
        public ?string $channelCid = null, // Channel CID for channel-specific unban
        public ?string $decisionReason = null, // Reason for the appeal decision
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
