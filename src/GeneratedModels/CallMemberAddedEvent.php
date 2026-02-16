<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when one or more members are added to a call
 */
class CallMemberAddedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        /** @var array<MemberResponse>|null */
        #[ArrayOf(MemberResponse::class)]
        public ?array $members = null, // the members added to this call
        public ?CallResponse $call = null,
        public ?string $type = null, // The type of event: "call.member_added" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
