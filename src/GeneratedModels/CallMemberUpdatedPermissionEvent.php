<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when one or more members get its role updated
 */
class CallMemberUpdatedPermissionEvent extends BaseModel
{
    public function __construct(
        public ?CallResponse $call = null,
        public ?string $type = null, // The type of event: "call.member_added" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?array $capabilitiesByRole = null, // The capabilities by role for this call
        /** @var array<MemberResponse>|null */
        #[ArrayOf(MemberResponse::class)]
        public ?array $members = null, // The list of members that were updated
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
