<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent to notify about permission changes for a user, clients receiving this event should update their UI accordingly
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property array<OwnCapability> $ownCapabilities
 * @property UserResponse $user
 * @property string $type
 */
class UpdatedCallPermissionsEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        /** @var array<OwnCapability>|null The capabilities of the current user */
        #[ArrayOf(OwnCapability::class)]
        public ?array $ownCapabilities = null, // The capabilities of the current user
        public ?UserResponse $user = null,
        public ?string $type = null, // The type of event: "call.permissions_updated" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
