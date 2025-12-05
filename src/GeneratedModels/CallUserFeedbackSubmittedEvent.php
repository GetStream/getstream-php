<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a user submits feedback for a call.
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property int $rating
 * @property string $sessionID
 * @property UserResponse $user
 * @property string $type
 * @property string|null $reason
 * @property string|null $sdk
 * @property string|null $sdkVersion
 * @property object|null $custom
 */
class CallUserFeedbackSubmittedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?int $rating = null, // The rating given by the user (1-5)
        public ?string $sessionID = null, // Call session ID
        public ?UserResponse $user = null,
        public ?string $type = null, // The type of event, "call.user_feedback" in this case
        public ?string $reason = null, // The reason provided by the user for the rating
        public ?string $sdk = null,
        public ?string $sdkVersion = null,
        public ?object $custom = null, // Custom data provided by the user
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
