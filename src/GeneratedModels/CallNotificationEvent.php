<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent to all call members to notify they are getting called
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property string $sessionID
 * @property array<MemberResponse> $members
 * @property CallResponse $call
 * @property UserResponse $user
 * @property string $type
 */
class CallNotificationEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $sessionID = null, // Call session ID
        /** @var array<MemberResponse>|null Call members */
        #[ArrayOf(MemberResponse::class)]
        public ?array $members = null, // Call members
        public ?CallResponse $call = null,
        public ?UserResponse $user = null,
        public ?string $type = null, // The type of event: "call.notification" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
