<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when a moderation blur action is applied to a user's video stream
 */
class CallModerationBlurEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $userID = null,    // The user ID whose video stream is being blurred 
        public ?object $custom = null,    // Custom data associated with the moderation action 
        public ?string $type = null,    // The type of event: "call.moderation_blur" in this case 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
