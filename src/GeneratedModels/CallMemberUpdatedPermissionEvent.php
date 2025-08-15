<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when one or more members get its role updated
 */
class CallMemberUpdatedPermissionEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?array $members = null,    // The list of members that were updated 
        public ?CallResponse $call = null,
        public ?array $capabilitiesByRole = null,    // The capabilities by role for this call 
        public ?string $type = null,    // The type of event: "call.member_added" in this case 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
