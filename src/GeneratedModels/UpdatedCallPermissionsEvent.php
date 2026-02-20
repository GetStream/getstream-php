<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent to notify about permission changes for a user, clients receiving this event should update their UI accordingly
 */
class UpdatedCallPermissionsEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "call.permissions_updated" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?UserResponse $user = null,
        /** @var array<OwnCapability>|null */
        #[ArrayOf(OwnCapability::class)]
        public ?array $ownCapabilities = null, // The capabilities of the current user
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
