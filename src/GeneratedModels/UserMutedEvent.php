<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a user gets muted. The event contains information about the user that was muted.
 */
class UserMutedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "user.muted" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?UserResponseCommonFields $user = null,
        public ?UserResponseCommonFields $targetUser = null,
        /** @var array<UserResponseCommonFields>|null */
        #[ArrayOf(UserResponseCommonFields::class)]
        public ?array $targetUsers = null, // The target users that were muted
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
