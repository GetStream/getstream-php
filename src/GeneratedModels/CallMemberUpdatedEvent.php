<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when one or more members are updated
 */
class CallMemberUpdatedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "call.member_updated" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?CallResponse $call = null,
        /** @var array<MemberResponse>|null */
        #[ArrayOf(MemberResponse::class)]
        public ?array $members = null, // The list of members that were updated
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
