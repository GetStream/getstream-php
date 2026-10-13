<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * What one rung user did about one ring, and which devices the ring reached.
 */
class RingTargetResponse extends BaseModel
{
    public function __construct(
        public ?string $state = null, // The target's state for this ring: pending, accepted, rejected, missed or cancelled
        public ?\DateTime $stateAt = null, // When the target last changed state
        public ?string $reason = null, // The reject or cancel reason, empty otherwise
        /** @var array<RingDeliveryResponse>|null */
        #[ArrayOf(RingDeliveryResponse::class)]
        public ?array $deliveries = null, // The dispatches of this ring to the target's devices
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
